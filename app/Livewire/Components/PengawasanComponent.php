<?php

namespace App\Livewire\Components;

use App\Livewire\DetailSk;
use Livewire\Component;
use App\Models\Kendaraan;
use App\Models\Sk;
use App\Models\SkPengawasan;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;


class PengawasanComponent extends Component
{
    use WithFileUploads;


    public $idnya;
    public $sk;
    public $dataSk;
    public $edit = false;
    public $idEdit;
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
        'fc_jasa_raharja' => null,
        'fc_kir' => null,
        'fc_stnk' => null,
        'fc_jasa_raharja' => null,
    ];

    public function mount() {

        // $this->kendaraan();
        // $this->idnya;
    }

    public function clear() {
        $this->form = [
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
            'fc_jasa_raharja' => null,
            'fc_kir' => null,
            'fc_stnk' => null,
            'fc_jasa_raharja' => null,
        ];

        $this->idEdit = false;
    }

    public function kendaraan() {
        $this->mobil =  Kendaraan::with(['perusahaan', 'trayek'])->findOrFail($this->dataSk->kendaraan_id);
    }
    #[On('edit-sk-pengawasan')]
    public function getEdit($id) {

        $a = SkPengawasan::findOrFail($id);
        $this->form = [
            'tanggal_sk' => $a->tanggal_sk,
            'nomor' => $a->nomor,
            'tanggal_mulai_berlaku' => $a->tanggal_mulai_berlaku,
            'tanggal_selesai_berlaku' => $a->tanggal_selesai_berlaku,
            'no_uji_kendaraan' => $a->no_uji_kendaraan,
        ];
        $this->edit = true;
        $this->idEdit = $id;
    }

    public function save() {
        $this->dataSk = Sk::find($this->sk);
        $this->kendaraan();
        if($this->edit) {
            $this->update();
        } else {
            $this->store();
        }

        $this->dispatch('detail-sk-refresh')->to(DetailSk::class);
    }

    public function update() {
        $this->validate([
            'form.tanggal_sk' => 'required',
            'form.nomor' => 'required',
            'form.tanggal_mulai_berlaku' => 'required',
            'form.tanggal_selesai_berlaku' => 'required',
            'form.no_uji_kendaraan' => 'required',
        ]);

        $dataUpdate = [
            "nomor" => $this->form['nomor'],
            "kendaraan_id" => $this->mobil->id,
            "sk_id" => $this->sk,
            "tanggal_sk" =>  $this->form['tanggal_sk'],
            "tanggal_mulai_berlaku" => $this->form['tanggal_mulai_berlaku'],
            "tanggal_selesai_berlaku" => $this->form['tanggal_selesai_berlaku'],
            "no_uji_kendaraan" => $this->form['no_uji_kendaraan'],
        ];

        if(isset($this->form['sk_trayek_sebelumnya'])) {
            $sk_trayek_sebelumnya = $this->form['sk_trayek_sebelumnya']->store( 'sk/sk_trayek_sebelumnya');
            $dataUpdate+[ "sk_trayek_sebelumnya" => $sk_trayek_sebelumnya??null];
         }
         if(isset($this->form['sk_pengawasan_terakhir'])) {
            $sk_pengawasan_terakhir = $this->form['sk_pengawasan_terakhir']->store( 'sk/sk_pengawasan_terakhir');
            $dataUpdate+[ "sk_pengawasan_terakhir" => $sk_pengawasan_terakhir??null];
        }

         if(isset($this->form['fc_jasa_raharja'])) {
            $fc_jasa_raharja = $this->form['fc_jasa_raharja']->store( 'sk/fc_jasa_raharja');
            $dataUpdate+[ "fc_jasa_raharja" => $fc_jasa_raharja??null];
        }
         if(isset($this->form['fc_kir'])) {
            $fc_jasa_raharja = $this->form['fc_kir']->store( 'sk/fc_kir');
            $dataUpdate+[ "fc_kir" => $fc_kir??null];
        }
         if(($this->form['fc_stnk'])) {
            $fc_stnk = $this->form['fc_stnk']->store( 'sk/fc_stnk');
            $dataUpdate+[ "fc_stnk" => $fc_stnk??null];
         }


        $a =  SkPengawasan::where('id', $this->idEdit)->update($dataUpdate);

         if($a){
             session()->flash('status', 'Post successfully updated.');
             $this->clear();

         }
    }

    public function store() {

        $this->validate([
            'form.tanggal_sk' => 'required',
            'form.nomor' => 'required',
            'form.tanggal_mulai_berlaku' => 'required',
            'form.tanggal_selesai_berlaku' => 'required',
            'form.no_uji_kendaraan' => 'required',

        ]);


        if(isset($this->form['sk_trayek_sebelumnya'])) {
           $sk_trayek_sebelumnya = $this->form['sk_trayek_sebelumnya']->store( 'sk/sk_trayek_sebelumnya');

        }
        if(isset($this->form['sk_pengawasan_terakhir'])) {
           $sk_pengawasan_terakhir = $this->form['sk_pengawasan_terakhir']->store( 'sk/sk_pengawasan_terakhir');
        }

        if(isset($this->form['fc_jasa_raharja'])) {
           $fc_jasa_raharja = $this->form['fc_jasa_raharja']->store( 'sk/fc_jasa_raharja');
        }
        if(isset($this->form['fc_kir'])) {
           $fc_jasa_raharja = $this->form['fc_kir']->store( 'sk/fc_kir');
        }
        if(($this->form['fc_stnk'])) {
           $fc_stnk = $this->form['fc_stnk']->store( 'sk/fc_stnk');
        }


       $a =  SkPengawasan::create([
                "nomor" => $this->form['nomor'],
                "kendaraan_id" => $this->mobil->id,
                "sk_id" => $this->sk,
                "tanggal_sk" =>  $this->form['tanggal_sk'],

                "tanggal_mulai_berlaku" => $this->form['tanggal_mulai_berlaku'],
                "tanggal_selesai_berlaku" => $this->form['tanggal_selesai_berlaku'],
                "no_uji_kendaraan" => $this->form['no_uji_kendaraan'],
                "sk_trayek_sebelumnya" => $sk_trayek_sebelumnya??null,
                "sk_pengawasan_terakhir" => $sk_pengawasan_terakhir??null,
                "fc_jasa_raharja" => $fc_jasa_raharja??null,
                "fc_kir" => $fc_kir??null,
                "fc_stnk" => $fc_stnk??null,
            ]);

        if($a){
            session()->flash('status', 'Post successfully updated.');
            $this->clear();

        }
    }
    public function render()
    {
        return view('livewire.components.pengawasan-component');
    }
}
