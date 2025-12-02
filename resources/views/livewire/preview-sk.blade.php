<div>
    <style>
        .preview-container,
        .preview-container * {
            color: #000 !important;
        }
        .preview-container table th,
        .preview-container table td {
            color: #000 !important;
            background-color: #fff !important;
        }
        .preview-container table.table-bordered {
            border: 1px solid #000 !important;
        }
        .preview-container table.table-bordered th,
        .preview-container table.table-bordered td {
            border: 1px solid #000 !important;
        }
    </style>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Preview Surat Keputusan</h5>
            <div>
                <button wire:click="exportWord" class="btn btn-primary btn-sm me-2">
                    <i class="fas fa-download"></i> Download Word
                </button>
                <a href="{{ route('detail-sk', $sk->id) }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="preview-container border p-4" style="background: #fff; max-width: 210mm; margin: 0 auto; font-family: 'Times New Roman', Times, serif; font-size: 12pt;">

                {{-- Header --}}
                <div class="text-center mb-4">
                    <h4 class="fw-bold mb-1">PEMERINTAH KABUPATEN</h4>
                    <h4 class="fw-bold mb-1">DINAS PERHUBUNGAN</h4>
                    <hr style="border: 2px solid #000;">
                </div>

                {{-- Judul --}}
                <div class="text-center mb-4">
                    <h5 class="fw-bold text-decoration-underline">SURAT KEPUTUSAN</h5>
                    <p class="mb-1">Nomor: {{ $sk->nomor ?? '-' }}</p>
                    <p class="mb-0">Tentang</p>
                    <p class="fw-bold">IZIN PENYELENGGARAAN ANGKUTAN ORANG DALAM TRAYEK</p>
                </div>

                {{-- Kepala Dinas --}}
                <div class="mb-4">
                    <p class="fw-bold text-center mb-3">KEPALA DINAS PERHUBUNGAN</p>
                </div>

                {{-- Isi --}}
                <div class="mb-4">
                    <p class="mb-2">Membaca dan memperhatikan permohonan dari:</p>

                    <table class="mb-3" style="margin-left: 20px;">
                        <tr>
                            <td style="width: 180px;">Nama Badan Hukum</td>
                            <td style="width: 20px;">:</td>
                            <td>{{ $sk->perusahaan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pimpinan</td>
                            <td>:</td>
                            <td>{{ $sk->perusahaan->pemimpin ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $sk->perusahaan->alamat ?? '-' }}</td>
                        </tr>
                    </table>
                </div>

                {{-- Memutuskan --}}
                <div class="mb-4 text-center">
                    <p class="fw-bold">MEMUTUSKAN</p>
                </div>

                <div class="mb-4">
                    <p class="mb-2">Memberikan izin penyelenggaraan angkutan orang dalam trayek kepada:</p>

                    <table class="mb-3" style="margin-left: 20px;">
                        <tr>
                            <td style="width: 180px;">Trayek</td>
                            <td style="width: 20px;">:</td>
                            <td>{{ $sk->trayek->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Masa Berlaku</td>
                            <td>:</td>
                            <td>{{ $sk->masa_berlaku ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Berlaku Sampai</td>
                            <td>:</td>
                            <td>{{ $sk->tanggal_selesai_berlaku ? \Carbon\Carbon::parse($sk->tanggal_selesai_berlaku)->translatedFormat('j F Y') : '-' }}</td>
                        </tr>
                    </table>
                </div>

                {{-- Tabel Kendaraan --}}
                <div class="mb-4">
                    <p class="fw-bold mb-2">Dengan Kendaraan:</p>
                    <table class="table table-bordered" style="font-size: 11pt;">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nomor Kendaraan</th>
                                <th>Nomor Uji</th>
                                <th>Merk</th>
                                <th>Tahun</th>
                                <th>Daya Angkut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($kendaraan)
                            <tr>
                                <td class="text-center">1</td>
                                <td>{{ $kendaraan->no_kendaraan ?? '-' }}</td>
                                <td>{{ $kendaraan->no_uji_kendaraan ?? '-' }}</td>
                                <td>{{ $kendaraan->merek ?? '-' }}</td>
                                <td class="text-center">{{ $kendaraan->tahun_pembuatan ?? '-' }}</td>
                                <td class="text-center">{{ $kendaraan->daya_angkut ?? '-' }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- Tanggal dan Tanda Tangan --}}
                <div class="row mt-5">
                    <div class="col-6"></div>
                    <div class="col-6 text-center">
                        <p class="mb-0">Ditetapkan di: ...................</p>
                        <p class="mb-4">Pada tanggal: {{ \Carbon\Carbon::now()->translatedFormat('j F Y') }}</p>

                        <p class="fw-bold mb-0">KEPALA DINAS PERHUBUNGAN</p>
                        <br><br><br>
                        <p class="fw-bold mb-0 text-decoration-underline">{{ $kepalaDinas->nama ?? '.............................' }}</p>
                        <p class="mb-0">NIP. {{ $kepalaDinas->nip ?? '.............................' }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
