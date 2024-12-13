<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\SkPengawasan;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Sk;
use Carbon\Carbon;


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
    public function exportWord()
    {

        Carbon::setLocale('id');
        // Validasi input
        if (!$this->skId) {
            session()->flash('error', 'ID SK tidak ditemukan.');
            return;
        }

        // Ambil data SK
        $sk = SkPengawasan::with(['sk' => function($r) {
            $r->with(['perusahaan', 'trayek', 'kendaraans']);
        }])->find($this->skId);



        if (!$sk) {
            session()->flash('error', 'Data SK tidak ditemukan.');
            return;
        }

        // Path template Word
        $templatePath = storage_path('app/templates/kartu_pengawasan.docx');
        $outputPath = storage_path("app/public/Kartu_Pengawasan{$sk->id}.docx");

        // Load template
        $templateProcessor = new TemplateProcessor($templatePath);

        $tangal_mulai = Carbon::parse($sk->tanggal_mulai_berlaku)->translatedFormat('j F Y');
        $tangal_selesai = Carbon::parse($sk->tanggal_selesai_berlaku )->translatedFormat('j F Y');



        // Isi placeholder dengan data SK
        $templateProcessor->setValue('nomor_sk', $sk->nomor ?? '-');
        $templateProcessor->setValue('masa_berlaku', $sk->masa_berlaku ?? '-');
        $templateProcessor->setValue('trayek', $sk->trayek->nama ?? '-');
        $templateProcessor->setValue('nama_badan_hukum', $sk->perusahaan->nama ?? '-');
        $templateProcessor->setValue('nama_pimpinan', $sk->perusahaan->pemimpin ?? '-');
        $templateProcessor->setValue('alamat_badan_hukum', $sk->perusahaan->alamat ?? '-');
        $templateProcessor->setValue('trayek', $sk->trayek->nama ?? '-');
        $templateProcessor->setValue('berlaku', $sk->perusahaan->alamat ?? '-');
        $templateProcessor->setValue("berlaku_mulai", $tangal_mulai?? '-');
        $templateProcessor->setValue("berlaku_sampai",  $tangal_selesai ?? '-');


        // Isi tabel kendaraan
        $kendaraan = $sk->sk->kendaraans;
        // dd($sk);
        // array_push($kendaraans , $sk->kendaraans);
        // dd($kendaraans);
        // $templateProcessor->cloneRow('no_urut', count($kendaraans));
        // foreach ($kendaraans as $index => $kendaraan) {
        //     $rowIndex = $index + 1;

            $templateProcessor->setValue("no_urut", 1);
            $templateProcessor->setValue("nomor_induk", $kendaraan->nomor_induk ?? '-');
            $templateProcessor->setValue("nomor_kendaraan", $kendaraan->no_kendaraan ?? '-');
            $templateProcessor->setValue("nomor_uji", $sk->no_uji_kendaraan ?? '-');
            $templateProcessor->setValue("merk", $kendaraan->merk ?? '-');
            $templateProcessor->setValue("tahun_pembuatan", $kendaraan->tahun_pembuatan ?? '-');
            $templateProcessor->setValue("daya_angkut", $kendaraan->daya_angkut ?? '-');
            $templateProcessor->setValue("sifat_perjalanan", $kendaraan->sifat_perjalanan ?? '-');
            $templateProcessor->setValue("kode_trayek", $kendaraan->kode_trayek ?? '-');

        // }

        // Simpan dokumen hasil
        $templateProcessor->saveAs($outputPath);
    }

    public function render()
    {
        $filePath = 'public/Kartu_Pengawasan'.$this->skId.'.docx';
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
