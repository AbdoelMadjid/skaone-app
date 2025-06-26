<!-- Ribbon Shape -->
<div class="card ribbon-box border shadow-none mb-lg-0">
    <div class="card-body">
        <div class="ribbon ribbon-danger ribbon-shape">Ulang Tahun Bulan Ini</div>
        <div class="ribbon-content text-muted mt-5">
            <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                @if ($ulangTahun->isEmpty())
                    <p>Tidak ada yang ulang tahun bulan ini</p>
                @else
                    @foreach ($ulangTahun as $personil)
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1">
                                <p class="text-truncate text-muted fs-14 mb-0">
                                    <i class="mdi mdi-circle align-middle text-info me-2"></i>
                                    {!! $personil->namalengkap !!}
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <p class="mb-2">
                                    @if (
                                        \Carbon\Carbon::parse($personil->tanggallahir)->day == \Carbon\Carbon::today()->day &&
                                            \Carbon\Carbon::parse($personil->tanggallahir)->month == \Carbon\Carbon::today()->month)
                                        <span
                                            class="badge bg-danger">{{ \Carbon\Carbon::parse($personil->tanggallahir)->format('d-m-Y') }}</span>
                                    @else
                                        {{ \Carbon\Carbon::parse($personil->tanggallahir)->format('d-m-Y') }}
                                    @endif
                                </p>
                            </div>
                        </div><!-- end -->
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
