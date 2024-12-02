<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @else
        <div>
            <div class="mb-4 row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="p-4 card-body">
                            <h5 class="mb-4">Detail SK</h5>
                            <div class="mb-3">
                                <strong>Nomor SK:</strong> {{ $sk->nomor ?? '-' }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal SK:</strong>
                                {{ $sk->tanggal_sk ? $sk->tanggal_sk->format('d-m-Y') : '-' }}
                            </div>
                            <div class="mb-3">
                                <strong>Perusahaan:</strong> {{ $sk->perusahaan->nama ?? '-' }}
                            </div>
                            <div class="mb-3">
                                <strong>Trayek:</strong> {{ $sk->trayek->nama ?? '-' }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal Mulai Berlaku:</strong>
                                {{ $sk->tanggal_mulai_berlaku ? $sk->tanggal_mulai_berlaku->format('d-m-Y') : '-' }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal Selesai Berlaku:</strong>
                                {{ $sk->tanggal_selesai_berlaku ? $sk->tanggal_selesai_berlaku->format('d-m-Y') : '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="p-4 card-body">
                            <h5 class="mb-4">Kendaraan Terkait</h5>
                            @if ($sk->kendaraans->isEmpty())
                                <p>Tidak ada kendaraan terkait.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No Kendaraan</th>
                                            <th>Merek</th>
                                            <th>Pemilik</th>
                                            <th>Tahun Pembuatan</th>
                                            <th>Daya Angkut</th>
                                            <th>Kelas Pelayanan</th>
                                            <th>No Uji Kendaraan</th>
                                            <th>Sifat Perjalanan</th>
                                            <th>Perusahaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sk->kendaraans as $kendaraan)
                                            <tr>
                                                <td>{{ $kendaraan->no_kendaraan ?? '-' }}</td>
                                                <td>{{ $kendaraan->merek ?? '-' }}</td>
                                                <td>{{ $kendaraan->pemilik ?? '-' }}</td>
                                                <td>{{ $kendaraan->tahun_pembuatan ?? '-' }}</td>
                                                <td>{{ $kendaraan->daya_angkut ?? '-' }}</td>
                                                <td>{{ $kendaraan->kelas_pelayanan ?? '-' }}</td>
                                                <td>{{ $kendaraan->no_uji_kendaraan ?? '-' }}</td>
                                                <td>{{ $kendaraan->sifat_perjalanan ?? '-' }}</td>
                                                <td>{{ $kendaraan->perusahaan->nama ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    @endif
</div>
