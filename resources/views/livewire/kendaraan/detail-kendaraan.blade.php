<div>
    <div class="row">
        <div class="col-12 col-lg-4 d-flex">
            <div class="card w-100">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <b>No Kendaraan</b>
                        <br>
                        123 Street Name, City, Australia
                    </li>
                    <li class="list-group-item">
                        <b>Perusahaan</b>
                        <br>
                        mail@example.com
                    </li>
                    <li class="list-group-item">
                        <b>Pemilik</b>
                        <br>
                        Toll Free (123) 472-796
                        <br>
                        Mobile : +91-9910XXXX
                    </li>
                    <li class="list-group-item">
                        <b>Daya Angkut</b>
                        <br>
                        Toll Free (123) 472-796
                        <br>
                        Mobile : +91-9910XXXX
                    </li>
                    <li class="list-group-item">
                        <b>Merek</b>
                        <br>
                        Toll Free (123) 472-796
                        <br>
                        Mobile : +91-9910XXXX
                    </li>
                    <li class="list-group-item">
                        <b>Kelas Pelayanan</b>
                        <br>
                        Toll Free (123) 472-796
                        <br>
                        Mobile : +91-9910XXXX
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-8 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="mb-3 fw-bold">Buat SK</h5>
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
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="button" class="btn btn-primary px-4">Submit</button>
                                <button type="button" class="btn btn-light px-4">Reset</button>
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

                </table>
            </div>
        </div>
    </div>
</div>
