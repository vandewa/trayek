<?php

namespace App\Livewire;

use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Sk;
use App\Models\Kendaraan;

class ExportSkWord extends Component
{
    public $skId;

    public function mount($id) {
        $this->skId = 3;
        $this->exportWord();
    }

    public function exportWord()
    {
        // Validasi input
        if (!$this->skId) {
            session()->flash('error', 'ID SK tidak ditemukan.');
            return;
        }

        // Ambil data SK
        $sk = Sk::with(['perusahaan', 'trayek', 'kendaraans'])->find($this->skId);

        if (!$sk) {
            session()->flash('error', 'Data SK tidak ditemukan.');
            return;
        }

        // Path template Word
        $templatePath = storage_path('app/templates/Surat_Keputusan_Template.docx');
        $outputPath = storage_path("app/public/Surat_Keputusan_{$sk->id}.docx");

        // Load template
        $templateProcessor = new TemplateProcessor($templatePath);

        // Isi placeholder dengan data SK
        $templateProcessor->setValue('nomor_sk', $sk->nomor ?? '-');
        $templateProcessor->setValue('masa_berlaku', $sk->masa_berlaku ?? '-');
        $templateProcessor->setValue('trayek', $sk->trayek->nama ?? '-');
        $templateProcessor->setValue('nama_badan_hukum', $sk->perusahaan->nama ?? '-');
        $templateProcessor->setValue('nama_pimpinan', $sk->perusahaan->pemimpin ?? '-');
        $templateProcessor->setValue('alamat_badan_hukum', $sk->perusahaan->alamat ?? '-');

        // Isi tabel kendaraan
        $kendaraans = $sk->kendaraans;
        $templateProcessor->cloneRow('no_urut', count($kendaraans));
        foreach ($kendaraans as $index => $kendaraan) {
            $rowIndex = $index + 1;
            $templateProcessor->setValue("no_urut#$rowIndex", $index + 1);
            $templateProcessor->setValue("nomor_induk#$rowIndex", $kendaraan->nomor_induk ?? '-');
            $templateProcessor->setValue("nomor_kendaraan#$rowIndex", $kendaraan->nomor_kendaraan ?? '-');
            $templateProcessor->setValue("nomor_uji#$rowIndex", $kendaraan->nomor_uji ?? '-');
            $templateProcessor->setValue("merk#$rowIndex", $kendaraan->merk ?? '-');
            $templateProcessor->setValue("tahun_pembuatan#$rowIndex", $kendaraan->tahun_pembuatan ?? '-');
            $templateProcessor->setValue("daya_angkut#$rowIndex", $kendaraan->daya_angkut ?? '-');
            $templateProcessor->setValue("sifat_perjalanan#$rowIndex", $kendaraan->sifat_perjalanan ?? '-');
            $templateProcessor->setValue("kode_trayek#$rowIndex", $kendaraan->kode_trayek ?? '-');
        }

        // Simpan dokumen hasil
        $templateProcessor->saveAs($outputPath);

        return redirect()->route('detail-sk', $this->skId);

        // Berikan respons untuk unduhan
        // return response()->download($outputPath)->deleteFileAfterSend(true);
    }

    // public function render()
    // {
    //     return redirect()->back();
    //     return view('livewire.export-sk-word');
    // }
}
