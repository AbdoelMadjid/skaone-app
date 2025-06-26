@php
    $isInformasiTerkiniActive = App\Helpers\Fitures::isFiturAktif('informasi-terkini');
    $isDashboardStatistikLoginActive = App\Helpers\Fitures::isFiturAktif('dashboard-statistik-login');
@endphp

@if ($isInformasiTerkiniActive)
    {{-- <!-- right offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"><i data-feather="check-circle" class="text-success icon-dual-success icon-xs"></i>
                PENGUMUMAN / INFORMASI</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-info-subtle">
            @if ($pengumumanHariIni->isEmpty())
                <div class="card ribbon-box border shadow-none right mb-lg-3">
                    <div class="card-body">
                        <div class="ribbon ribbon-info round-shape">Informasi Hari ini</div>
                        <h5 class="fs-14 text-start">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</h5>
                        <div class="ribbon-content mt-5">
                            <p class="mb-4 mt-4">Tidak ada pengumuman / informasi hari ini </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="card ribbon-box border shadow-none right mb-lg-3">
                    <div class="card-body">
                        <div class="ribbon ribbon-info round-shape">Informasi Hari ini</div>
                        <h5 class="fs-14 text-start">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</h5>
                        <div class="ribbon-content mt-4">
                            @foreach ($pengumumanHariIni as $pengumuman)
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i data-feather="check-circle"
                                            class="text-success icon-dual-success icon-xs"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-info">{{ $pengumuman->judul }}</h5>
                                        <p class="mb-2">{{ $pengumuman->isi }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="card ribbon-box border shadow-none right mb-lg-3">
                <div class="card-body">
                    <div class="ribbon ribbon-info round-shape">Informasi Sebelumnya</div>
                    <h5 class="fs-14 text-start"></h5>
                    <div class="ribbon-content mt-5">
                        <div data-simplebar data-simplebar-auto-hide="false" style="max-height: 200px;" class="px-3">
                            @foreach ($pengumumanAll as $pengumuman)
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i data-feather="check-circle"
                                            class="text-success icon-dual-success icon-xs"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-info">{{ $pengumuman->judul }}</h5>
                                        <p class="mb-0">
                                            {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('l, d F Y') }}
                                        </p>
                                        <p class="mb-2">{{ $pengumuman->isi }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-foorter border-top p-3 text-center">
            <a href="javascript:void(0);" class="link-success">View All Acitivity <i
                    class="ri-arrow-right-s-line align-middle ms-1"></i></a>
        </div>
    </div> --}}
    <style>
        .flexible-banner {
            background-image: url('{{ URL::asset('images/galery/1730179060.jpg') }}');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .flexible-banner::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.4);
            /* Lapisan hitam transparan */
            backdrop-filter: blur(2px);
            /* Efek blur ringan */
            z-index: 0;
        }

        /* Pastikan isi tetap di atas overlay */
        .flexible-banner {
            position: relative;
            z-index: 1;
        }

        .flexible-banner>* {
            position: relative;
            z-index: 1;
        }
    </style>

    <div id="InfoEvenModals" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
            <div class="modal-content border-0 overflow-hidden flexible-banner">
                <div class="modal-header login-modal p-3">
                    <h5 class="text-white fs-20 mt-2">Informasi Terkini</h5>
                    <button type="button" class="btn-close text-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="card card-overlay bg-transparent">
                        {{-- <img class="card-img" src="{{ URL::asset('images/galery/1730179060.jpg') }}" alt="Card image"> --}}
                        <div class="p-0 d-flex flex-column">
                            @forelse ($judulUtama as $judul)
                                <div class="card-header bg-transparent">
                                    <h4 class="card-title text-white mb-0">{{ $judul->judul }}</h4>
                                </div>
                                <div class="card-body">
                                    @forelse ($judul->pengumumanTerkiniAktif as $index => $pengumuman)
                                        <div class="mini-stats-wid d-flex align-items-center mt-3">
                                            <div class="flex-shrink-0 avatar-sm">
                                                <span
                                                    class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-4">
                                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 card-text text-white fs-4">{{ $pengumuman->judul }}
                                                </h6>
                                                @foreach ($pengumuman->poin as $poin)
                                                    <p class="mb-0 card-text text-white">{{ $poin->isi }}</p>
                                                @endforeach
                                            </div>
                                        </div><!-- end -->
                                    @empty
                                        <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show"
                                            role="alert">
                                            <i class="ri-error-warning-line label-icon"></i><strong>Mohon Maaf
                                                !</strong> -
                                            Poin Pengumuman Masih Kosong
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endforelse
                                </div>
                            @empty
                                <div class="card-body">
                                    <!-- Danger Alert -->
                                    <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show"
                                        role="alert">
                                        <i class="ri-error-warning-line label-icon"></i><strong>Mohon Maaf !</strong> -
                                        Tidak ada
                                        pengumuman
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>

                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-transparent p-3 justify-content-center">
                    <p class="mb-0 text-muted text-white fs-10">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card overflow-hidden shadow-none">
            <div class="card-body bg-primary text-white fw-semibold d-flex">
                <marquee class="fs-14" onmouseover="this.stop();" onmouseout="this.start();">
                    {{ $message }}
                </marquee>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        @include('dashboard.dashboard-personil-widget')
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-xl-4 col-md-6">
        @include('dashboard.dashboard-personil-user-sedang-login')
        @include('dashboard.dashboard-personil-ultah')
    </div>
    <div class="col-xl-8 col-md-6">
        @include('dashboard.dashboard-personil-login')
        @include('dashboard.dashboard-personil-siswa-login')
    </div>
</div>

@include('dashboard.dashboard-personil-calendar')

@if ($isDashboardStatistikLoginActive)
    @include('dashboard.dashboard-personil-statistik-log')
@endif
