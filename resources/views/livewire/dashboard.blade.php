<div>
    {{-- <livewire:chart.sk-chart> --}}

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 border-0 border-start border-primary border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Kendaraan Aktif</p>
                            <h4 class="mb-0 text-primary">{{ $totalKendaraan }}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                            <i class="bi bi-taxi-front-fill"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4.5px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $presentaseKendaraan }}%;"
                            aria-valuenow="{{ $presentaseKendaraan }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-success border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Perusahaan Aktif</p>
                            <h4 class="mb-0 text-success">{{ $totalPerusahaan }}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-building"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4.5px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ $presentasePerusahaan }}%;" aria-valuenow="{{ $presentasePerusahaan }}"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-danger border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Trayek Aktif</p>
                            <h4 class="mb-0 text-danger">{{ $totalTrayek }}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-danger text-white">
                            <i class="bi bi-sign-railroad-fill"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4.5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $presentaseTrayek }}%;"
                            aria-valuenow="{{ $presentaseTrayek }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-warning border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total User</p>
                            <h4 class="mb-0 text-warning">{{ $totalUser }}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-warning text-dark">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4.5px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->

    <div class="row">
        <div class="col-md-12">

            <div class="card card-success card-outline">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center mb-4">
                        <div class="col-auto">
                            <h3>Dashboard</h3>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <div>
                                <label for="start_date">Dari:</label>
                                <input type="date" id="start_date" wire:model.live="startDate" class="form-control">
                            </div>
                            <div>
                                <label for="end_date">Sampai:</label>
                                <input type="date" id="end_date" wire:model.live="endDate" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Trayek</th>
                                <th>Surat Keputusan (SK)</th>
                                <th>Kartu Pengawasan</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $list)
                                    <tr>
                                        <td>{{ $list->nama }}</td>
                                        <td>{{ $list->sk_count }}</td>
                                        <td>{{ $list->pengawasan_count }}</td>
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
