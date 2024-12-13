<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Form Trayek</h5>
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
                                <label for="input1" class="form-label">Status</label>
                                <select class="form-control" wire:model.live="form.active_st">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non Aktif</option>
                                </select>
                                @error('form.active_st')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                <button type="button" wire:click='batal' class="btn btn-light px-4">Reset</button>
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
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <input type="text" class="form-control" placeholder="Search" wire:model.live='cari'>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $item)
                                    <tr wire:key='{{ $item->id }}'>
                                        <td>{{ $loop->index + $post->firstItem() }}
                                        </td>
                                        <td> {{ $item->nama ?? '-' }}</td>
                                        <td>
                                            @if ($item->active_st == '1')
                                                Aktif
                                            @elseif($item->active_st == '0')
                                                Non Aktif
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                                <div class="mr-2">
                                                    <button type="button" wire:click="getEdit('{{ $item->id }}')"
                                                        class="btn btn-warning btn-sm">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        wire:click="delete('{{ $item->id }}')">
                                                        Hapus
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
