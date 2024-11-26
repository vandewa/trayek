<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Perusahaan;
use Livewire\WithPagination;
use App\Models\Sk as ModelsSk;
use App\Models\Trayek;

class Sk extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari;

    public $form = [
        'nomor' => null,
        'perusahaan_id' => null,
        'tanggal_sk' => null,
        'trayek_id' => null,
        'tanggal_mulai_berlaku' => null,
        'tanggal_selesai_berlaku' => null,
    ];

    public function mount()
    {
        $this->form['tanggal_sk'] = date('Y-m-d');
        $this->form['tanggal_mulai_berlaku'] = date('Y-m-d');
        $this->form['tanggal_selesai_berlaku'] = date('Y-m-d');
    }

    public function ambilPerusahaan()
    {
        return Perusahaan::all()->toArray();
    }
    public function ambilTrayek()
    {
        return Trayek::all()->toArray();
    }

    public function getEdit($a)
    {
        $this->form = ModelsSk::find($a)->toArray();
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
        ModelsSk::create($this->form);
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
        ModelsSk::destroy($this->idHapus);
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
        ModelsSk::find($this->idHapus)->update($this->form);
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
    }

    public function resett()
    {
        $this->form['nomor'] = null;
        $this->form['perusahaan_id'] = null;
        $this->form['tanggal_sk'] = null;
        $this->form['trayek_id'] = null;
        $this->form['tanggal_mulai_berlaku'] = null;
        $this->form['tanggal_selesai_berlaku'] = null;
    }

    public function render()
    {
        $data = ModelsSk::paginate(10);

        return view('livewire.sk', [
            'post' => $data,
            'listPerusahaan' => $this->ambilPerusahaan(),
            'listTrayek' => $this->ambilTrayek()
        ]);
    }
}
