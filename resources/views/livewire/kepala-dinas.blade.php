<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Form Kepala Dinas</h5>
                    <form class="row g-3" wire:submit.prevent='save'>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Nama</label>
                                <input type="text" class="form-control" wire:model='form.nama'
                                    placeholder="Masukkan Nama">
                                @error('form.nama')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="input1" class="form-label">NIP</label>
                                <input type="number" class="form-control" wire:model='form.nip'
                                    placeholder="Masukkan NIP">
                                @error('form.nip')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--end row-->
</div>
