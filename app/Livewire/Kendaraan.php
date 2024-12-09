<?php

namespace App\Livewire;

use App\Models\Kendaraan as ModelsKendaraan;
use App\Models\Perusahaan;
use Livewire\Component;
use Livewire\WithPagination;

class Kendaraan extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari;

    public $form = [
        'no_kendaraan' => null,
        'perusahaan_id' => null,
        'kendaraan_st' => null,
        'pemilik' => null,
        'tahun_pembuatan' => null,
        'daya_angkut' => null,
        'merek' => null,
        'kelas_pelayanan' => null,
        'no_uji_kendaraan' => null,
        'sifat_perjalanan' => null,
    ];

    public function mount()
    {
        //
    }

    public function ambilPerusahaan()
    {
        return Perusahaan::all()->toArray();
    }

    public function getEdit($a)
    {
        $this->form = ModelsKendaraan::find($a)->toArray();
        $this->idHapus = $a;
        $this->edit = true;
    }

    public function save()
    {
        if ($this->edit) {
            $this->storeUpdate();
        } else {
            $this->store();
        }

        $this->resett();

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }

    public function store()
    {
        ModelsKendaraan::create($this->form);
    }

    public function delete($id)
    {
        $this->idHapus = $id;
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
                text: "Apakah kamu ingin menghapus data ini? proses ini tidak dapat dikembalikan.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
                $wire.hapus()
            }
          })
        JS);
    }

    public function hapus()
    {
        ModelsKendaraan::destroy($this->idHapus);
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }

    public function storeUpdate()
    {
        ModelsKendaraan::find($this->idHapus)->update($this->form);
        $this->reset();
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->resett();
    }

    public function resett()
    {
        $this->form['no_kendaraan'] = null;
        $this->form['perusahaan_id'] = null;
        $this->form['kendaraan_st'] = null;
        $this->form['pemilik'] = null;
        $this->form['tahun_pembuatan'] = null;
        $this->form['daya_angkut'] = null;
        $this->form['merek'] = null;
        $this->form['kelas_pelayanan'] = null;
        $this->form['no_uji_kendaraan'] = null;
        $this->form['sifat_perjalanan'] = null;
    }

    public function render()
    {
        $data = ModelsKendaraan::with(['perusahaan'])->cari($this->cari);

        // if (!auth()->user()->hasRole(['superadmin', 'admin'])) {

        //     $data = $data->where('perusahaan_id', auth()->user()->perusahaan_id);
        // }

        $data = $data->paginate(10);

        return view('livewire.kendaraan', [
            'post' => $data,
            'listPerusahaan' => $this->ambilPerusahaan()
        ]);
    }
}
