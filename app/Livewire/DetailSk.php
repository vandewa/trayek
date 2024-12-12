<?php

namespace App\Livewire;

use App\Livewire\Components\PengawasanComponent;
use Livewire\Component;
use App\Models\Sk;
use Illuminate\Support\Facades\Storage;
use App\Models\Kendaraan;
use App\Models\SkPengawasan;
use PhpOffice\PhpWord\TemplateProcessor;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class DetailSk extends Component
{
    use WithPagination;
    public $skId;
    public $sk;
    public $mobil;
    public $form = false;

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
        $this->mobile();
    }

    public function mobile() {
        $this->mobil =  Kendaraan::with(['perusahaan', 'trayek'])->findOrFail($this->sk->kendaraan_id);
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
        $templateProcessor->setValue('trayek', $sk->trayek->nama ?? '-');
        $templateProcessor->setValue('berlaku', $sk->perusahaan->alamat ?? '-');

        // Isi tabel kendaraan
        $kendaraan = $sk->kendaraans;
        // array_push($kendaraans , $sk->kendaraans);
        // dd($kendaraans);
        // $templateProcessor->cloneRow('no_urut', count($kendaraans));
        // foreach ($kendaraans as $index => $kendaraan) {
        //     $rowIndex = $index + 1;
            $templateProcessor->setValue("no_urut", 1);
            $templateProcessor->setValue("nomor_induk", $kendaraan->nomor_induk ?? '-');
            $templateProcessor->setValue("nomor_kendaraan", $kendaraan->nomor_kendaraan ?? '-');
            $templateProcessor->setValue("nomor_uji", $kendaraan->nomor_uji ?? '-');
            $templateProcessor->setValue("merk", $kendaraan->merk ?? '-');
            $templateProcessor->setValue("tahun_pembuatan", $kendaraan->tahun_pembuatan ?? '-');
            $templateProcessor->setValue("daya_angkut", $kendaraan->daya_angkut ?? '-');
            $templateProcessor->setValue("sifat_perjalanan", $kendaraan->sifat_perjalanan ?? '-');
            $templateProcessor->setValue("kode_trayek", $kendaraan->kode_trayek ?? '-');
        // }

        // Simpan dokumen hasil
        $templateProcessor->saveAs($outputPath);
    }

    #[On('detail-sk-refresh')]
    public function refresh() {
        $this->tutupForm();
    }

    public function editSkPengawaan($id) {
        $this->tampilkanForm();
        $this->dispatch('edit-sk-pengawasan', id: $id)->to(PengawasanComponent::class);

    }

    public function tampilkanForm() {
        $this->form = true;
    }
    public function tutupForm() {
        $this->form = false;
    }

    public function tambahSkPengawasan() {

    }

    public function render()
    {
        $filePath = 'public/Surat_keputusan_'.$this->skId.'.docx';
        if (Storage::exists($filePath)) {
            $file = true;
        } else {
            $file = false;
        }

        $data = SkPengawasan::where('sk_id', $this->skId)->paginate(10);
        return view('livewire.detail-sk', [
            'cek_file' => $file,
            'path' => $filePath,
            'pengawasan' => $data
        ]);
    }
}
