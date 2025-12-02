<?php

namespace App\Livewire;

use App\Models\Kepala;
use Livewire\Component;
use App\Models\Sk;
use App\Models\SkPengawasan;
use App\Models\Kendaraan;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;

class PreviewKp extends Component
{
    public $kpId;
    public $kp;
    public $sk;
    public $kendaraan;
    public $kepalaDinas;

    public function mount($id)
    {
        $this->kpId = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->kp = SkPengawasan::with(['sk.perusahaan', 'sk.trayek', 'sk.kendaraans'])->find($this->kpId);

        if (!$this->kp) {
            session()->flash('error', 'Kartu Pengawasan tidak ditemukan.');
            return;
        }

        $this->sk = $this->kp->sk;
        $this->kendaraan = $this->sk->kendaraans ?? null;
        $this->kepalaDinas = Kepala::first();
    }

    public function exportWord()
    {
        if (!$this->kpId) {
            session()->flash('error', 'ID Kartu Pengawasan tidak ditemukan.');
            return;
        }

        $templatePath = storage_path('app/templates/kartu_pengawasan.docx');
        $outputPath = storage_path("app/public/Kartu_Pengawasan_{$this->kp->id}.docx");

        if (!file_exists($templatePath)) {
            session()->flash('error', 'Template Kartu Pengawasan tidak ditemukan.');
            return;
        }

        $templateProcessor = new TemplateProcessor($templatePath);

        $templateProcessor->setValue('nomor_kp', $this->kp->nomor ?? '-');
        $templateProcessor->setValue('tanggal_kp', $this->kp->tanggal_sk ? Carbon::parse($this->kp->tanggal_sk)->translatedFormat('j F Y') : '-');
        $templateProcessor->setValue('nomor_sk', $this->sk->nomor ?? '-');
        $templateProcessor->setValue('trayek', $this->sk->trayek->nama ?? '-');
        $templateProcessor->setValue('kode_trayek', $this->sk->trayek->nama ?? '-');
        $templateProcessor->setValue('nama_perusahaan', $this->sk->perusahaan->nama ?? '-');
        $templateProcessor->setValue('pemilik_perusahaan', $this->sk->perusahaan->pemimpin ?? '-');
        $templateProcessor->setValue('alamat_perusahaan', $this->sk->perusahaan->alamat ?? '-');
        $templateProcessor->setValue('kode_perusahaan', '-');
        $templateProcessor->setValue('tanggal_mulai', $this->kp->tanggal_mulai_berlaku ? Carbon::parse($this->kp->tanggal_mulai_berlaku)->translatedFormat('j F Y') : '-');
        $templateProcessor->setValue('tanggal_selesai', $this->kp->tanggal_selesai_berlaku ? Carbon::parse($this->kp->tanggal_selesai_berlaku)->translatedFormat('j F Y') : '-');

        if ($this->kendaraan) {
            $templateProcessor->setValue('nomor_kendaraan', $this->kendaraan->no_kendaraan ?? '-');
            $templateProcessor->setValue('nomor_uji', $this->kendaraan->no_uji_kendaraan ?? '-');
            $templateProcessor->setValue('merk', $this->kendaraan->merek ?? '-');
            $templateProcessor->setValue('tahun_pembuatan', $this->kendaraan->tahun_pembuatan ?? '-');
            $templateProcessor->setValue('daya_angkut', $this->kendaraan->daya_angkut ?? '-');
            $templateProcessor->setValue('pemilik', $this->kendaraan->pemilik ?? '-');
        }

        $templateProcessor->setValue('nama_kepala', $this->kepalaDinas->nama ?? '-');
        $templateProcessor->setValue('nip_kepala', $this->kepalaDinas->nip ?? '-');

        $templateProcessor->saveAs($outputPath);

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Berhasil!',
            text: 'Dokumen Kartu Pengawasan berhasil di-generate.',
            icon: 'success',
        })
        JS);
    }

    public function render()
    {
        return view('livewire.preview-kp');
    }
}
