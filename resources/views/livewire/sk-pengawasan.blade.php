<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Vertical Form</h5>
                    <form class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Nomor</label>
                                <input type="text" class="form-control" wire:model='form.nomor'
                                    placeholder="Nomor Kendaraan">
                                @error('form.nomor')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Tgl SK</label>
                                <input type="text" class="form-control" wire:model='form.tanggal_sk'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_sk')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="input1" class="form-label">SK</label>
                                <input type="text" class="form-control" wire:model='form.sk_id'
                                    placeholder="Nomor Kendaraan">
                                @error('form.sk_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Kendaraan</label>
                                <input type="text" class="form-control" wire:model='form.kendaraan_id'
                                    placeholder="Nomor Kendaraan">
                                @error('form.kendaraan_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Tgl Mulai Berlaku</label>
                                <input type="text" class="form-control" wire:model='form.tanggal_mulai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_mulai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="input1" class="form-label">Tgl Selesai Berlaku</label>
                                <input type="text" class="form-control" wire:model='form.tanggal_selesai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_selesai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
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
    </div><!--end row-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tgl. SK</th>
                                    <th>SK</th>
                                    <th>Kendaraan</th>
                                    <th>Tgl. Mulai</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $item)
                                    <tr wire:key='{{ $item->id }}'>
                                        <td>{{ $loop->index + $post->firstItem() }}
                                        </td>
                                        <td> {{ $item->nomor ?? '-' }}</td>
                                        <td> {{ $item->tanggal_sk ?? '-' }}</td>
                                        <td> {{ $item->sk_id ?? '-' }}</td>
                                        <td> {{ $item->kendaraan_id ?? '-' }}</td>
                                        <td> {{ $item->tanggal_mulai_berlaku ?? '-' }}</td>
                                        <td> {{ $item->tanggal_selesai_berlaku ?? '-' }}</td>
                                        <td>
                                            <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                                <div class="mr-2">
                                                    <button type="button" wire:click="getEdit('{{ $item->id }}')"
                                                        class="btn btn-warning btn-flat btn-sm" data-toggle="tooltip"
                                                        data-placement="left" title="Edit"><i
                                                            class="fas fa-pencil-alt"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-flat btn-sm"
                                                        wire:click="delete('{{ $item->id }}')"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
