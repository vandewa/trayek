<?php

namespace App\Livewire;

use App\Models\Perusahaan as ModelsPerusahaan;
use Livewire\Component;
use Livewire\WithPagination;

class Perusahaan extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari;

    public $form = [
        'nama' => null,
        'pemimpin' => null,
        'telepon' => null,
        'alamat' => null,
        'sk' => null,
        'tahun' => null,
        'active_st' => null,
    ];

    public function mount()
    {
        //
    }

    public function getEdit($a)
    {
        $this->form = ModelsPerusahaan::find($a)->toArray();
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
        ModelsPerusahaan::create($this->form);
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
        ModelsPerusahaan::destroy($this->idHapus);
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
        ModelsPerusahaan::find($this->idHapus)->update($this->form);
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->resett();
    }

    public function resett()
    {
        $this->form['nama'] = null;
        $this->form['pemimpin'] = null;
        $this->form['telepon'] = null;
        $this->form['alamat'] = null;
        $this->form['sk'] = null;
        $this->form['tahun'] = null;
        $this->form['active_st'] = null;
    }

    public function render()
    {
        $data = ModelsPerusahaan::paginate(10);

        return view('livewire.perusahaan', [
            'post' => $data,
        ]);
    }
}
