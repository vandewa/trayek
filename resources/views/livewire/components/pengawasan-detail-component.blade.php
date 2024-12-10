<div>
    <div class="modal fade @if ($modal) show @endif" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true"
        @if ($modal) style="display: block; padding-right: 15px;"
        @else style="display: none;" @endif>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail SK Pengawasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click='closeMOdal'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-4">Detail SK</h5>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <strong>Nomor SK:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $sk->nomor ?? '-' }}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <strong>Tanggal SK:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $sk->tanggal_sk ?? null ? \Carbon\Carbon::parse($sk->tanggal_sk)->format('d-m-Y') : '-' }}

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <strong>Perusahaan:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $sk->perusahaan->nama ?? '-' }}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <strong>Trayek:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $sk->trayek->nama ?? '-' }}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <strong>Tanggal Mulai Berlaku:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $sk->tanggal_mulai_berlaku ?? null ? \Carbon\Carbon::parse($sk->tanggal_mulai_berlaku)->format('d-m-Y') : '-' }}

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <strong>Tanggal Selesai Berlaku:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $sk->tanggal_selesai_berlaku ?? null ? \Carbon\Carbon::parse($sk->tanggal_selesai_berlaku)->format('d-m-Y') : '-' }}


                                </div>
                            </div>
                            <div class="mt-4 d-flex">
                                <button wire:click='exportWord' class="btn btn-primary me-2">Generate
                                    SK</button>
                                @if ($cek_file)
                                    <a href="{{ route('helper.show-picture', ['path' => $path]) }}"
                                        class="btn btn-primary">Download Draft</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-4">Bukti Dukung</h5>
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>SK Trayek Sebelumnya</td>
                                        <td>
                                            @if ($sk->sk_trayek_sebelumnya ?? null)
                                                <a href="{{ route('helper.show-picture', ['path' => $sk->sk_trayek_sebelumnya]) }}"
                                                    class="btn btn-primary"> Download</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>SK Pengawasan Terakhir</td>
                                        <td>
                                            @if ($sk->sk_pengawasan_terakhir ?? null)
                                                <a href="{{ route('helper.show-picture', ['path' => $sk->sk_pengawasan_terakhir]) }}"
                                                    class="btn btn-primary"> Download</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Jasa Raharja</td>
                                        <td>
                                            @if ($sk->fc_jasa_raharja ?? null)
                                                <a href="{{ route('helper.show-picture', ['path' => $sk->fc_jasa_raharja]) }}"
                                                    class="btn btn-primary"> Download</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>KIR</td>
                                        <td>
                                            @if ($sk->fc_kir ?? null)
                                                <a href="{{ route('helper.show-picture', ['path' => $sk->fc_kir]) }}"
                                                    class="btn btn-primary"> Download</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>STNK</td>
                                        <td>
                                            @if ($sk->fc_stnk ?? null)
                                                <a href="{{ route('helper.show-picture', ['path' => $sk->fc_stnk]) }}"
                                                    class="btn btn-primary"> Download</a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeMOdal'>Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
