<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @else
        <div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4 row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-4">Detail SK</h5>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <strong>Nomor SK:</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $sk->nomor ?? '-' }}
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <strong>Tanggal SK:</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $sk->tanggal_sk ? \Carbon\Carbon::parse($sk->tanggal_sk)->format('d-m-Y') : '-' }}

                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <strong>Perusahaan:</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $sk->perusahaan->nama ?? '-' }}
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <strong>Trayek:</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $sk->trayek->nama ?? '-' }}
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <strong>Tanggal Mulai Berlaku:</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $sk->tanggal_mulai_berlaku ? \Carbon\Carbon::parse($sk->tanggal_mulai_berlaku)->format('d-m-Y') : '-' }}

                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <strong>Tanggal Selesai Berlaku:</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $sk->tanggal_selesai_berlaku ? \Carbon\Carbon::parse($sk->tanggal_selesai_berlaku)->format('d-m-Y') : '-' }}


                                                </div>
                                            </div>
                                            <div class="mt-4 d-flex">
                                                <button wire:click='exportWord' class="btn btn-primary me-2">Generate
                                                    SK</button>
                                                @if ($cek_file)
                                                    <a href="{{ route('helper.show-picture', ['path' => $path]) }}"
                                                        class="btn btn-primary">Download Draft</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-4">Bukti Dukung</h5>
                                            <table class="table">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>SK Trayek Sebelumnya</td>
                                                        <td>
                                                            @if ($sk->sk_trayek_sebelumnya)
                                                                <a href="{{ route('helper.show-picture', ['path' => $sk->sk_trayek_sebelumnya]) }}"
                                                                    class="btn btn-primary"> Download</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>SK Pengawasan Terakhir</td>
                                                        <td>
                                                            @if ($sk->sk_pengawasan_terakhir)
                                                                <a href="{{ route('helper.show-picture', ['path' => $sk->sk_pengawasan_terakhir]) }}"
                                                                    class="btn btn-primary"> Download</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Jasa Raharja</td>
                                                        <td>
                                                            @if ($sk->fc_jasa_raharja)
                                                                <a href="{{ route('helper.show-picture', ['path' => $sk->fc_jasa_raharja]) }}"
                                                                    class="btn btn-primary"> Download</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>KIR</td>
                                                        <td>
                                                            @if ($sk->fc_kir)
                                                                <a href="{{ route('helper.show-picture', ['path' => $sk->fc_kir]) }}"
                                                                    class="btn btn-primary"> Download</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>STNK</td>
                                                        <td>
                                                            @if ($sk->fc_stnk)
                                                                <a href="{{ route('helper.show-picture', ['path' => $sk->fc_stnk]) }}"
                                                                    class="btn btn-primary"> Download</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Detail SK -->



                                    <!-- Detail Kendaraan -->
                                    <hr class="my-4">
                                    <h5 class="mb-4">Detail Kendaraan</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <strong>No Kendaraan:</strong><br>
                                                    {{ $mobil->no_kendaraan ?? '-' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Perusahaan:</strong><br>
                                                    {{ $mobil->perusahaan->nama ?? '-' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Pemilik:</strong><br>
                                                    {{ $mobil->pemilik ?? '-' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Daya Angkut:</strong><br>
                                                    {{ $mobil->daya_angkut ?? '-' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Merek:</strong><br>
                                                    {{ $mobil->merek ?? '-' }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <strong>Tahun Pembuatan:</strong><br>
                                                    {{ $mobil->tahun_pembuatan ?? '-' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Kelas Pelayanan:</strong><br>
                                                    {{ $mobil->kelas_pelayanan ?? '-' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Sifat Perjalanan:</strong><br>
                                                    {{ $mobil->sifat_perjalanan ?? '-' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Trayek:</strong><br>
                                                    {{ $mobil->trayek->nama ?? '-' }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="p-4 card-body">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <h5 class="mb-3 text-center fw-bold">SK Pengawaan
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table">
                                                            <thead>
                                                                <th>Nomor</th>
                                                                <th>Tanggal</th>
                                                                <th>Berlaku</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($pengawasan as $item)
                                                                    <tr>
                                                                        <td>{{ $item->nomor }}</td>
                                                                        <td>{{ $item->tanggal_sk }}</td>
                                                                        <td>{{ $item->tanggal_mulai_berlaku }} S/D
                                                                            {{ $item->tanggal_selesai_berlaku }}</td>
                                                                        <td>
                                                                            <button class="btn btn-primary"
                                                                                wire:click="$dispatch('detail-sk-refresh', { id: {{ $item->id }} })">Detail</button>
                                                                            <button class="btn btn-warning"
                                                                                wire:click='editSkPengawaan({{ $item->id }})'>Edit
                                                                            </button>
                                                                            <button class="btn btn-danger">Hapus
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div class="row">
                                                        <div class="pull-right col-md-12">
                                                            <button class="btn btn-primary"
                                                                wire:click='tampilkanForm'>Tambah SK
                                                                Pengawasan</button>
                                                            @if ($form)
                                                                <button class="btn btn-warning"
                                                                    wire:click='tutupForm'>Batalkan</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                    </div>

                                    <div @if (!$form) style="display: none" @endif>
                                        <livewire:components.pengawasan-component :sk="$sk->id">
                                    </div>





                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>








        </div>
    @endif
    <livewire:components.pengawasan-detail-component>
</div>
