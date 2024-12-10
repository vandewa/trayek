<div>
    {{-- <livewire:chart.sk-chart> --}}
    <div class="row">
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
                            <th>Pengawasan</th>
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
