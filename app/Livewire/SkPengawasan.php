<?php

namespace App\Livewire;

use App\Models\SkPengawasan as ModelsSkPengawasan;
use Livewire\Component;
use Livewire\WithPagination;

class SkPengawasan extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari;

    public $form = [
        'nomor' => null,
        'tanggal_sk' => null,
        'sk_id' => null,
        'kendaraan_id' => null,
        'tanggal_mulai_berlaku' => null,
        'tanggal_selesai_berlaku' => null,
    ];

    public function mount()
    {
        //
    }

    public function getEdit($a)
    {
        $this->form = ModelsSkPengawasan::find($a)->toArray();
        $this->edit = true;
    }

    public function save()
    {
        if ($this->edit) {
            $this->storeUpdate();
        } else {
            $this->store();
        }

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
        ModelsSkPengawasan::create($this->form);
    }

    public function delete($id)
    {
        $this->idHapus = $id;
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Apakah kamu ingin menghapus data ini? proses ini tidak dapat dikembalikan.",
            icon: 'warning',
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
        ModelsSkPengawasan::destroy($this->idHapus);
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
        ModelsSkPengawasan::find($this->idHapus)->update($this->form);
        $this->reset();
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function render()
    {
        $data = ModelsSkPengawasan::paginate(10);

        return view('livewire.sk-pengawasan', [
            'post' => $data,
        ]);
    }
}
