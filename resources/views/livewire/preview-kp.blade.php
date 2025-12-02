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
            <h5 class="mb-0">Preview Kartu Pengawasan</h5>
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
                    <h5 class="fw-bold text-decoration-underline">KARTU PENGAWASAN</h5>
                    <p class="mb-1">Nomor: {{ $kp->nomor ?? '-' }}</p>
                </div>

                {{-- Info KP --}}
                <div class="mb-4">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 180px;">Tanggal</td>
                            <td style="width: 20px;">:</td>
                            <td>{{ $kp->tanggal_sk ? \Carbon\Carbon::parse($kp->tanggal_sk)->translatedFormat('j F Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Nomor SK</td>
                            <td>:</td>
                            <td>{{ $sk->nomor ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Berlaku</td>
                            <td>:</td>
                            <td>{{ $kp->tanggal_mulai_berlaku ? \Carbon\Carbon::parse($kp->tanggal_mulai_berlaku)->translatedFormat('j F Y') : '-' }} s/d {{ $kp->tanggal_selesai_berlaku ? \Carbon\Carbon::parse($kp->tanggal_selesai_berlaku)->translatedFormat('j F Y') : '-' }}</td>
                        </tr>
                    </table>
                </div>

                {{-- Info Perusahaan --}}
                <div class="mb-4">
                    <p class="fw-bold mb-2">Data Perusahaan:</p>
                    <table style="width: 100%; margin-left: 20px;">
                        <tr>
                            <td style="width: 180px;">Nama Perusahaan</td>
                            <td style="width: 20px;">:</td>
                            <td>{{ $sk->perusahaan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Pemilik/Pemimpin</td>
                            <td>:</td>
                            <td>{{ $sk->perusahaan->pemimpin ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $sk->perusahaan->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Trayek</td>
                            <td>:</td>
                            <td>{{ $sk->trayek->nama ?? '-' }}</td>
                        </tr>
                    </table>
                </div>

                {{-- Info Kendaraan --}}
                <div class="mb-4">
                    <p class="fw-bold mb-2">Data Kendaraan:</p>
                    <table class="table table-bordered" style="font-size: 11pt;">
                        <thead>
                            <tr class="text-center">
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
