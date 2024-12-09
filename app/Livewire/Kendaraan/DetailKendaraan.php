<?php

namespace App\Livewire\Kendaraan;

use Livewire\Component;
use App\Models\Kendaraan;
use App\Models\Sk;
use Livewire\WithFileUploads;

class DetailKendaraan extends Component
{

    use WithFileUploads;

    public $idnya;
    public $mobil;
    public $form = [
        'tanggal_sk' => null,
        'nomor' => null,
        'tanggal_mulai_berlaku' => null,
        'tanggal_selesai_berlaku' => null,
        'sk_trayek_sebelumnya' => null,
        'sk_pengawasan_terakhir' => null,
        'fc_jasa_raharja' => null,
        'fc_kir' => null,
        'fc_stnk' => null,
        'no_uji_kendaraan' => null,
    ];

    public function mount($id) {
        $this->idnya = $id;

        $this->kendaraan();
    }

    public function kendaraan() {
        $this->mobil =  Kendaraan::with(['perusahaan', 'trayek'])->findOrFail($this->idnya);
    }

    public function save() {

        dd("tekan");
        if($this->form['sk_trayek_sebelumnya']) {
           $sk_trayek_sebelumnya = $this->form['sk_trayek_sebelumnya']->store(path: 'sk/sk_trayek_sebelumnya');
        }
        if($this->form['sk_pengawasan_terakhir']) {
           $sk_pengawasan_terakhir = $this->form['sk_pengawasan_terakhir']->store(path: 'sk/sk_pengawasan_terakhir');
        }
        if($this->form['sk_pengawasan_terakhir']) {
           $sk_pengawasan_terakhir = $this->form['sk_pengawasan_terakhir']->store(path: 'sk/sk_pengawasan_terakhir');
        }
        if($this->form['fc_jasa_raharja']) {
           $fc_jasa_raharja = $this->form['fc_jasa_raharja']->store(path: 'sk/fc_jasa_raharja');
        }
        if($this->form['fc_kir']) {
           $fc_jasa_raharja = $this->form['fc_kir']->store(path: 'sk/fc_kir');
        }
        if($this->form['fc_stnk']) {
           $fc_stnk = $this->form['fc_stnk']->store(path: 'sk/fc_stnk');
        }


       $a =  Sk::create([
                "nomor" => $this->form['nomor'],
                "perusahaan_id" =>$this->mobil->perusahaan_id,
                "tanggal_sk" =>  $this->form['tanggal_sk'],
                "trayek_id" => $this->mobil->trayek_id,
                "tanggal_mulai_berlaku" => $this->form['tanggal_mulai_berlaku'],
                "tanggal_selesai_berlaku" => $this->form['tanggal_selesai_berlaku'],
                "no_uji_kendaraan" => $this->form['no_uji_kendaraan'],
                "sk_trayek_sebelumnya" => $sk_trayek_sebelumnya??null,
                "sk_pengawasan_terakhir" => $sk_pengawasan_terakhir??null,
                "sk_pengawasan_terakhir" => $sk_pengawasan_terakhir??null,
                "fc_jasa_raharja" => $fc_jasa_raharja??null,
                "fc_kir" => $fc_kir??null,
                "fc_stnk" => $fc_stnk??null,
            ]);

        if($a){
            session()->flash('status', 'Post successfully updated.');
        }



    }
    public function render()
    {
        $data = Sk::with(['perusahaan', 'trayek', 'kendaraans'])->paginate(10);
        return view('livewire.kendaraan.detail-kendaraan', [
            'sk' => $data
        ]);
    }
}
