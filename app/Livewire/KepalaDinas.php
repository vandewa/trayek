<?php

namespace App\Livewire;

use App\Models\Kepala as ModelsKepala;
use Livewire\Component;
use Livewire\WithPagination;

class KepalaDinas extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari;

    public $form = [
        'nama' => null,
        'nip' => null,
    ];

    public function mount()
    {
        $this->form = ModelsKepala::find(1)->only(['nama', 'nip']);
    }

    public function save()
    {
        ModelsKepala::find(1)->update($this->form);

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }

    public function render()
    {
        $data = ModelsKepala::first();

        return view('livewire.kepala-dinas', [
            'post' => $data,
        ]);
    }
}
