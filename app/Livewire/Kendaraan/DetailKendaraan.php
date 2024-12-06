<?php

namespace App\Livewire\Kendaraan;

use Livewire\Component;
use App\Models\Kendaraan;
use App\Models\Sk;

class DetailKendaraan extends Component
{

    public $idnya;
    public $mobil;

    public function mount($id) {
        $this->idnya = $id;

        $this->kendaraan();
    }

    public function kendaraan() {
        $this->mobil =  Kendaraan::find($this->idnya);
    }
    public function render()
    {
        $data = Sk::paginate(10);
        return view('livewire.kendaraan.detail-kendaraan');
    }
}
