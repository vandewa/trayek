<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Form SK</h5>
                    <form class="row g-3" wire:submit.prevent='save'>
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
                                <label for="input1" class="form-label">Perusahaan</label>
                                <select class="form-control" wire:model.live='form.perusahaan_id'>
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
                                <label for="input1" class="form-label">Tanggal SK</label>
                                <input type="date" class="form-control" wire:model='form.tanggal_sk'>
                                @error('form.tanggal_sk')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="input1" class="form-label">Trayek</label>
                                <select class="form-control" wire:model.defer='form.trayek_id'>
                                    <option value="">-- Pilih
                                        Trayek --</option>
                                    @foreach ($listTrayek ?? [] as $item)
                                        <option value="{{ $item['id'] }}">
                                            {{ $item['nama'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('form.trayek_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input1" class="form-label">Tgl Mulai Berlaku</label>
                                <input type="date" class="form-control" wire:model='form.tanggal_mulai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_mulai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <label for="input1" class="form-label">Tgl Selesai Berlaku</label>
                                <input type="date" class="form-control" wire:model='form.tanggal_selesai_berlaku'
                                    placeholder="Nomor Kendaraan">
                                @error('form.tanggal_selesai_berlaku')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group position-relative">
                                <label for="no_kendaraan">Nomor Kendaraan</label>
                                <input type="text" id="no_kendaraan" wire:model.live.debounce.300ms="no_kendaraan"
                                    class="form-control" placeholder="Masukkan Nomor Kendaraan">

                                @if (!empty($searchResults))
                                    <ul class="list-group position-absolute w-100" style="z-index: 1000;">
                                        @foreach ($searchResults as $result)
                                            <li class="list-group-item list-group-item-action"
                                                wire:click="selectKendaraan({{ $result['id'] }})">
                                                {{ $result['no_kendaraan'] }} | {{ $result['pemilik'] }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>




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
                                    @foreach ($listKendaraan as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}
                                            </td>
                                            <td> {{ $item->no_kendaraan ?? '-' }}</td>
                                            <td> {{ $item->perusahaan_id ?? '-' }} | {{ $item->pemilik ?? '-' }}</td>
                                            <td> {{ $item->merek ?? '-' }}</td>
                                            <td> {{ $item->kendaraan_st ?? '-' }}</td>
                                            <td> {{ $item->no_uji_kendaraan ?? '-' }}</td>
                                            <td>
                                                <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                                    <div class="mr-2">

                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            wire:click="deleteTable('{{ $index }}')">
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
                                    <th>Nomor</th>
                                    <th>Perusahaan</th>
                                    <th>Tgl. SK</th>
                                    <th>Trayek</th>
                                    <th>Tgl. Mulai</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Jumlah Kendaraan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $item)
                                    <tr wire:key='{{ $item->id }}'>

                                        <td>{{ $loop->index + $post->firstItem() }}
                                        </td>
                                        <td> {{ $item->nomor ?? '-' }}</td>
                                        <td> {{ $item->perusahaan->nama ?? '-' }}</td>
                                        <td> {{ $item->tanggal_sk ?? '-' }}</td>
                                        <td> {{ $item->trayek->nama ?? '-' }}</td>
                                        <td> {{ $item->tanggal_mulai_berlaku ?? '-' }}</td>
                                        <td> {{ $item->tanggal_selesai_berlaku ?? '-' }}</td>
                                        <td> {{ $item->sk_kendaraan_count ?? '-' }}</td>
                                        <td>
                                            <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                                <div class="mr-2">
                                                    <button type="button" wire:click="getEdit('{{ $item->id }}')"
                                                        class="btn btn-info btn-sm">
                                                        Detail
                                                    </button>
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
