<div>
    <div class="card w-100">
        <div class="card-body">
            <h5 class="mb-3 text-center fw-bold">Form Pembuatan SK Pengawasan
            </h5>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="row g-3" wire:submit='save'>
                <div class="col-md-12">
                    <div class="mb-2">
                        <label for="input1" class="form-label">SK</label>
                        <input type="text" class="form-control" wire:model='form.nomor'
                            placeholder="Nomor Kendaraan">
                        @error('form.nomor')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Tanggal SK</label>
                        <input type="date" class="form-control" wire:model='form.tanggal_sk'
                            placeholder="Nomor Kendaraan">
                        @error('form.tanggal_sk')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Tanggal
                                    Mulai</label>
                                <input type="date" class="form-control" wire:model='form.tanggal_mulai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_mulai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Tanggal
                                    Selesai</label>
                                <input type="date" class="form-control" wire:model='form.tanggal_selesai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_selesai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">SK Trayek
                                    Sebelumnya</label>
                                <input type="file" class="form-control" wire:model='form.sk_trayek_sebelumnya'
                                    placeholder="SK trayek">
                                @error('form.sk_trayek_sebelumnya')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">SK Pengawasan
                                    Terakhir</label>
                                <input type="file" class="form-control" wire:model='form.sk_pengawasan_terakhir'
                                    placeholder="SK trayek">
                                @error('form.sk_trayek_sebelumnya')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Jasa
                                    Raharja</label>
                                <input type="file" class="form-control" wire:model='form.fc_jasa_raharja'
                                    placeholder="SK trayek">
                                @error('form.sk_trayek_sebelumnya')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">KIR</label>
                                <input type="file" class="form-control" wire:model='form.fc_kir'
                                    placeholder="SK trayek">
                                @error('form.fc_kir')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
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

                <div wire:loading wire:target="save, remove">
                    Proses penyimpanan data .....
                </div>
            </form>

        </div>

    </div>
</div>
