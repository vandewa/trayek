<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\SkPengawasan;
use Illuminate\Support\Facades\Storage;


class PengawasanDetailComponent extends Component
{

    public $modal = false;
    public $sk;
    public $skId;

    public function openModal() {
        $this->modal = true;
    }
    public function closeMOdal() {
        $this->modal = false;
    }
    public function toogleModal() {
        $this->modal = !$this->modal;
    }

    #[On('detail-sk-refresh')]
    public function detailData($id) {
        $this->sk=SkPengawasan::find($id);
        $this->skId = $id;
        $this->openModal();
    }
    public function render()
    {
        $filePath = 'public/Surat_keputusan_'.$this->skId.'.docx';
        if (Storage::exists($filePath)) {
            $file = true;
        } else {
            $file = false;
        }
        return view('livewire.components.pengawasan-detail-component', [
            'cek_file' => $file,
            'path' => $filePath,
        ]);
    }
}
