<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sk;

class DetailSk extends Component
{
    public $skId;
    public $sk;

    public function mount($id)
    {
        $this->skId = $id;
        $this->loadSk();
    }

    public function loadSk()
    {
        $this->sk = Sk::with(['perusahaan', 'trayek', 'kendaraans.perusahaan'])->find($this->skId);

        if (!$this->sk) {
            session()->flash('error', 'SK tidak ditemukan.');
            // Anda bisa mengarahkan ulang atau menangani error sesuai kebutuhan
        }
    }

    public function render()
    {
        return view('livewire.detail-sk');
    }
}
