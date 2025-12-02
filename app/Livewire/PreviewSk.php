<?php

namespace App\Livewire;

use App\Models\Kepala;
use Livewire\Component;
use App\Models\Sk;
use App\Models\Kendaraan;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;

class PreviewSk extends Component
{
    public $skId;
    public $sk;
    public $kendaraan;
    public $kepalaDinas;

    public function mount($id)
    {
        $this->skId = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->sk = Sk::with(['perusahaan', 'trayek', 'kendaraans.trayek'])->find($this->skId);

        if (!$this->sk) {
            session()->flash('error', 'SK tidak ditemukan.');
            return;
        }

        $this->kendaraan = $this->sk->kendaraans;
        $this->kepalaDinas = Kepala::first();
    }

    public function exportWord()
    {
        if (!$this->skId) {
            session()->flash('error', 'ID SK tidak ditemukan.');
            return;
        }

        $sk = $this->sk;
        $kendaraan = $this->kendaraan;

        $templatePath = storage_path('app/templates/Surat_Keputusan_Template.docx');
        $outputPath = storage_path("app/public/Surat_Keputusan_{$sk->id}.docx");

        $templateProcessor = new TemplateProcessor($templatePath);
        $penetapan = Carbon::parse(date('Y-m-d'))->translatedFormat('j F Y');
        $tangal_selesai = Carbon::parse($sk->tanggal_selesai_berlaku)->translatedFormat('j F Y');

        $templateProcessor->setValue('nomor_sk', $sk->nomor ?? '-');
        $templateProcessor->setValue('masa_berlaku', $sk->masa_berlaku ?? '-');
        $templateProcessor->setValue('trayek', $sk->trayek->nama ?? '-');
        $templateProcessor->setValue('nama_badan_hukum', $sk->perusahaan->nama ?? '-');
        $templateProcessor->setValue('nama_pimpinan', $sk->perusahaan->pemimpin ?? '-');
        $templateProcessor->setValue('alamat_badan_hukum', $sk->perusahaan->alamat ?? '-');
        $templateProcessor->setValue('berlaku', $sk->perusahaan->alamat ?? '-');
        $templateProcessor->setValue('tanggal_penetapan', $penetapan ?? '-');
        $templateProcessor->setValue("berlaku_sampai", $tangal_selesai ?? '-');
        $templateProcessor->setValue("kelas", 'Ekonomi');

        $templateProcessor->setValue("no_urut", 1);
        $templateProcessor->setValue("nomor_induk", $kendaraan->nomor_induk ?? '-');
        $templateProcessor->setValue("nomor_kendaraan", $kendaraan->no_kendaraan ?? '-');
        $templateProcessor->setValue("nomor_uji", $kendaraan->no_uji_kendaraan ?? '-');
        $templateProcessor->setValue("merk", $kendaraan->merek ?? '-');
        $templateProcessor->setValue("tahun_pembuatan", $kendaraan->tahun_pembuatan ?? '-');
        $templateProcessor->setValue("daya_angkut", $kendaraan->daya_angkut ?? '-');
        $templateProcessor->setValue("sifat_perjalanan", $kendaraan->sifat_perjalanan ?? '-');
        $templateProcessor->setValue("kode_trayek", $sk->trayek->nama ?? '-');

        $templateProcessor->setValue("nama_kepala", $this->kepalaDinas->nama ?? '-');
        $templateProcessor->setValue("nip_kepala", $this->kepalaDinas->nip ?? '-');

        $templateProcessor->saveAs($outputPath);

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Berhasil!',
            text: 'Dokumen SK berhasil di-generate.',
            icon: 'success',
        })
        JS);
    }

    public function render()
    {
        return view('livewire.preview-sk');
    }
}
