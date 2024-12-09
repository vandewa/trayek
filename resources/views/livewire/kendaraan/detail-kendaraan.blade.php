<div>
    <div class="row">
        <div class="col-12 col-lg-4 d-flex">
            <div class="card w-100">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <b>No Kendaraan</b>
                        <br>
                        {{ $mobil->no_kendaraan }}
                    </li>
                    <li class="list-group-item">
                        <b>Perusahaan</b>
                        <br>
                        {{ $mobil->perusahaan->nama }}
                    </li>
                    <li class="list-group-item">
                        <b>Pemilik</b>
                        <br>
                        {{ $mobil->pemilik ?? '- ' }}

                    </li>
                    <li class="list-group-item">
                        <b>Daya Angkut</b>
                        <br>
                        {{ $mobil->daya_angkut ?? '-' }}

                    </li>
                    <li class="list-group-item">
                        <b>Merek</b>
                        <br>
                        {{ $mobil->merek ?? '-' }}

                    </li>
                    <li class="list-group-item">
                        <b>Tahun Pembuatan</b>
                        <br>
                        {{ $mobil->tahun_pembuatan ?? '-' }}

                    </li>
                    <li class="list-group-item">
                        <b>Kelas Pelayanan</b>
                        <br>
                        {{ $mobil->kelas_pelayanan ?? '-' }}

                    </li>
                    <li class="list-group-item">
                        <b>Sifat Perjalanan</b>
                        <br>
                        {{ $mobil->sifat_perjalanan ?? '-' }}

                    </li>
                    <li class="list-group-item">
                        <b>Trayek</b>
                        <br>
                        {{ $mobil->trayek->nama ?? '-' }}

                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-8 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="mb-3 fw-bold">Buat SK</h5>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="row g-3">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="input1" class="form-label">SK</label>
                                <input type="text" class="form-control" wire:model='form.nomor'
                                    placeholder="Nomor Kendaraan">
                                @error('form.sk_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="input1" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" wire:model='form.tanggal_mulai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_mulai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="input1" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" wire:model='form.tanggal_selesai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_selesai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="input1" class="form-label">Nomor Uji Kendaraan</label>
                                <input type="text" class="form-control" wire:model='form.no_uji_kendaraan'
                                    placeholder="Nomor Kendaraan">
                                @error('form.no_uji_kendaraan')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-0">
                                        <label for="input1" class="form-label">Sk Trayek Sebelumnya</label>
                                        <input type="file" class="form-control"
                                            wire:model='form.sk_trayek_sebelumnya' placeholder="SK trayek">
                                        @error('form.sk_trayek_sebelumnya')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-0">
                                        <label for="input1" class="form-label">SK Pengawasan Terakhir</label>
                                        <input type="file" class="form-control"
                                            wire:model='form.sk_pengawasan_terakhir' placeholder="SK trayek">
                                        @error('form.sk_trayek_sebelumnya')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-0">
                                        <label for="input1" class="form-label">Jasa Raharja</label>
                                        <input type="file" class="form-control" wire:model='form.fc_jasa_raharja'
                                            placeholder="SK trayek">
                                        @error('form.sk_trayek_sebelumnya')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-0">
                                        <label for="input1" class="form-label">KIR</label>
                                        <input type="file" class="form-control" wire:model='form.fc_kir'
                                            placeholder="SK trayek">
                                        @error('form.fc_kir')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-0">
                                        <label for="input1" class="form-label">STNK</label>
                                        <input type="file" class="form-control" wire:model='form.fc_stnk'
                                            placeholder="SK trayek">
                                        @error('form.fc_stnk')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="gap-3 d-md-flex d-grid align-items-center">
                                <button type="submit" class="px-4 btn btn-primary">Submit</button>
                                <button type="button" class="px-4 btn btn-light">Reset</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-0 text-uppercase">History SK</h6>
                <div class="my-3 border-top"></div>
                <table class="table">
                    <thead>
                        <th>Nomor SK</th>
                        <th>Tanggal</th>
                        <th>Berlaku</th>
                        <th>Berakhir</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($sk as $item)
                            <tr>
                                <td>{{ $item->nomor_sk }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
