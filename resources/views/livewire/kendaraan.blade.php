<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Form Kendaraan</h5>
                    <form class="row g-3" wire:submit="save">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Nomor Kendaraan</label>
                                <input type="text" class="form-control" wire:model='form.no_kendaraan'
                                    placeholder="Nomor Kendaraan">
                                @error('form.no_kendaraan')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Perusahaan</label>
                                <select class="form-control" wire:model.defer='form.perusahaan_id'>
                                    <option value="">-- Pilih
                                        Perusahaan --</option>
                                    @foreach ($listPerusahaan ?? [] as $item)
                                        <option value="{{ $item['id'] }}">
                                            {{ $item['nama'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('form.perusahaan_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Status Kendaraan</label>
                                <select class="form-control" wire:model.live="form.kendaraan_st">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non Aktif</option>
                                </select>
                                @error('form.kendaraan_st')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Pemilik</label>
                                <input type="text" class="form-control" wire:model='form.pemilik'
                                    placeholder="Nama Pemilik">
                                @error('form.pemilik')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="input1" class="form-label">Tahun Pembuatan</label>
                                <input type="number" class="form-control" wire:model='form.tahun_pembuatan'
                                    placeholder="Tahun Pembuatan">
                                @error('form.tahun_pembuatan')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Daya Angkut</label>
                                <input type="number" class="form-control" wire:model='form.daya_angkut'
                                    placeholder="Daya Angkut">
                                @error('form.daya_angkut')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Merk</label>
                                <input type="text" class="form-control" wire:model='form.merek' placeholder="Merk">
                                @error('form.merek')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Kelas Pelayanan</label>
                                <input type="text" class="form-control" wire:model='form.kelas_pelayanan'
                                    placeholder="Kelas Pelayanan">
                                @error('form.kelas_pelayanan')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">No. Uji Kendaraan</label>
                                <input type="text" class="form-control" wire:model='form.no_uji_kendaraan'
                                    placeholder="Nomor Uji Kendaraan">
                                @error('form.no_uji_kendaraan')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="input1" class="form-label">Sifat Perjalanan</label>
                                <input type="text" class="form-control" wire:model='form.sifat_perjalanan'
                                    placeholder="Sifat Perjalanan">
                                @error('form.sifat_perjalanan')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="gap-3 d-md-flex d-grid align-items-center">
                                <button type="submit" class="px-4 btn btn-primary">Submit</button>
                                <button type="button" wire:click='batal' class="px-4 btn btn-light">Reset</button>
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
                                    <th>No</th>
                                    <th>No. Kendaraan</th>
                                    <th>Perusahaan</th>
                                    <th>Merk</th>
                                    <th>Status</th>
                                    <th>No. Uji Kendaraan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $item)
                                    <tr wire:key='{{ $item->id }}'>
                                        <td>{{ $loop->index + $post->firstItem() }}
                                        </td>
                                        <td> {{ $item->no_kendaraan ?? '-' }}</td>
                                        <td> {{ $item->perusahaan_id ?? '-' }} | {{ $item->pemilik ?? '-' }}</td>
                                        <td> {{ $item->merek ?? '-' }}</td>
                                        <td> {{ $item->kendaraan_st ?? '-' }}</td>
                                        <td> {{ $item->no_uji_kendaraan ?? '-' }}</td>
                                        <td>
                                            <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                                <div class="mr-2">
                                                    <a href="{{ route('detail-kendaraan', $item->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        SK
                                                    </a>
                                                    <button type="button"
                                                        wire:click="getEdit('{{ $item->id }}')"
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
