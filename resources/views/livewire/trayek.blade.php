<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card radius-10">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                @if ($edit)
                                    Edit
                                @else
                                    Tambah
                                @endif
                                Trayek
                            </button>
                        </h2>
                        <div id="collapseTwo"
                            class="accordion-collapse collapse @if ($edit) show @endif"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="p-4 card-body">
                                                <form class="row g-3" wire:submit.prevent='save'>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="input1" class="form-label">Nama</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='form.nama' placeholder="Masukkan Nama">
                                                            @error('form.nama')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-0">
                                                            <label for="input1" class="form-label">Status</label>
                                                            <select class="form-control"
                                                                wire:model.live="form.active_st">
                                                                <option value="">-- Pilih Status --</option>
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Non Aktif</option>
                                                            </select>
                                                            @error('form.active_st')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                                            <button type="submit"
                                                                class="btn btn-primary px-4">Submit</button>
                                                            <button type="button" wire:click='batal'
                                                                class="btn btn-light px-4">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <thead class="table-light">
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
                                            @if ($item->active_st == 1)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-dark">Non Aktif</span>
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
                    {{ $post->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
