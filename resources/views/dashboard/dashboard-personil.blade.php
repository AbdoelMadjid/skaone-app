@php
    $isMainMenuActive = App\Helpers\Fitures::isFiturAktif('informasi-terkini');
@endphp

@if ($isMainMenuActive)
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
                            {{-- <div class="mini-stats-wid d-flex align-items-center mt-3">
                                <div class="flex-shrink-0 avatar-sm">

                                </div>
                                <div class="flex-grow-1 ms-3">
                                </div>
                                <div class="flex-shrink-0">
                                    <p class="card-text p-4 flex-shrink-2">
                                        <small class="text-white">Team Kurikulum 2025</small>
                                    </p>
                                </div>
                            </div><!-- end --> --}}
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
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-md-3 row-cols-1">
                    <div class="col col-lg border-end">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Guru & Tata Usaha {{-- <i
                                    class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i> --}}
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-supervisor display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value"
                                            data-target="{{ $jumlahPersonil }}">0</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col col-lg border-end">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Peserta Didik
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-group display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value"
                                            data-target="{{ $jumlahPD }}">0</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col col-lg border-end">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">
                                User Sedang Aktif
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-clock display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" id="active-user"
                                            data-target="{{ $activeUsersCount }}">0</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col col-lg">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">
                                User Login Hari ini
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-arrow-right display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" id="login-today"
                                            data-target="{{ $loginTodayCount }}">0</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col col-lg border-end">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">
                                Total Login
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-multiple-plus display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" id="login-count"
                                            data-target="{{ $loginCount }}">0</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col-xl-4 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">User Sedang Login</div>
                <div class="ribbon-content mt-5 text-muted">
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                        @if ($activeUsers->isEmpty())
                            <p>No users are currently logged in.</p>
                        @else
                            @foreach ($activeUsers->chunk(25) as $userChunk2)
                                <div class="col-md">
                                    @foreach ($userChunk2 as $user)
                                        <div
                                            class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                            <p class="fw-medium mb-0"><i
                                                    class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                {!! $user->name !!}</p>
                                            <div>

                                                <span class="text-success fw-medium fs-12">{{ $user->login_count }}
                                                    x</span>
                                            </div>
                                        </div><!-- end -->
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
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
    </div>
    <div class="col-xl-8 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-primary round-shape">Personil Sekolah Login Hari ini</div>
                <h5 class="fs-14 text-end">

                </h5>
                <div class="ribbon-content mt-5 text-muted">
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                        @if ($userLoginHariiniPersonil->isEmpty())
                            <p>No users have logged in today.</p>
                        @else
                            <div class="row">
                                @foreach ($userLoginHariiniPersonil->chunk(2) as $userRow)
                                    <div class="row">
                                        @foreach ($userRow as $user)
                                            <div class="col-md-6">
                                                <div
                                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                                    <p class="fw-medium mb-0">
                                                        @if ($user->avatar == 'personil.jpg')
                                                            <img src="{{ URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                                alt="" class="avatar-xs rounded-circle me-2">
                                                        @else
                                                            <img src="{{ URL::asset('images/thumbnail/' . $user->avatar . '') }}"
                                                                alt="" class="avatar-xs rounded-circle me-2">
                                                        @endif
                                                        {{ str_replace('Pgw_', '', $user->personal_id) }} -
                                                        {!! $user->name !!}
                                                    </p>
                                                    <div>
                                                        <span
                                                            class="text-success fw-medium fs-12">{{ $user->login_count }}
                                                            x</span>
                                                    </div>
                                                </div><!-- end -->
                                            </div><!-- end col -->
                                        @endforeach
                                    </div><!-- end row -->
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-primary round-shape">Peserta Didik Login Hari ini</div>
                <div class="ribbon-content mt-5 text-muted">
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                        @if ($userLoginHariiniSiswa->isEmpty())
                            <p>No users have logged in today.</p>
                        @else
                            <div class="row">
                                @foreach ($userLoginHariiniSiswa->chunk(2) as $userRow)
                                    <div class="row">
                                        @foreach ($userRow as $user)
                                            <div class="col-md-6">
                                                <div
                                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                                    <p class="fw-medium mb-0">
                                                        @if ($user->avatar == 'siswacewek.png' || $user->avatar == 'siswacowok.png')
                                                            <img src="{{ URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                                alt="" class="avatar-xs rounded-circle me-2">
                                                        @else
                                                            <img src="{{ URL::asset('images/thumbnail/' . $user->avatar . '') }}"
                                                                alt="" class="avatar-xs rounded-circle me-2">
                                                        @endif
                                                        {{ $user->nis }} -
                                                        {!! $user->name !!}
                                                    </p>
                                                    <div>
                                                        <span
                                                            class="text-success fw-medium fs-12">{{ $user->login_count }}
                                                            x</span>
                                                    </div>
                                                </div><!-- end -->
                                            </div><!-- end col -->
                                        @endforeach
                                    </div><!-- end row -->
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8 col-md-8">
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">Kalendar Pendidikan</div>
                <div class="ribbon-content mt-5 text-muted">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">List Event</div>
                <div class="ribbon-content mt-5 text-muted">
                    <table class="table table-striped" id="event-list-table">
                        <thead>
                            <tr>
                                <th>Kegiatan</th>
                                <th style="width:200px;">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Event rows will be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">Statistik Login</div>
                <div class="ribbon-content mt-5 text-muted">
                    <div id="login_chart_realtime" data-colors='["--vz-info"]' class="apex-charts" dir="ltr">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">Polling</div>
                <div class="ribbon-content mt-5 text-muted">
                    @foreach ($pollings as $polling)
                        @php
                            $alreadyResponded = in_array($polling->id, $respondedPollingIds);
                        @endphp

                        @if ($alreadyResponded)
                            <div class="alert alert-success">
                                Anda sudah menjawab polling: <strong>{{ $polling->title }}</strong>
                            </div>
                        @else
                            <div class="card mb-4 border">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">{{ $polling->title }}</h5>
                                    <small>Periode:
                                        {{ \Carbon\Carbon::parse($polling->start_time)->format('d M Y H:i') }} -
                                        {{ \Carbon\Carbon::parse($polling->end_time)->format('d M Y H:i') }}</small>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('about.pollingsubmit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="polling_id" value="{{ $polling->id }}">

                                        @foreach ($polling->questions as $question)
                                            <div class="mb-4">
                                                <label
                                                    class="form-label fw-bold">{{ $question->question_text }}</label>

                                                @if ($question->question_type === 'multiple_choice')
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="answers[{{ $question->id }}]"
                                                                id="q{{ $question->id }}_{{ $i }}"
                                                                value="{{ $i }}" required>
                                                            <label class="form-check-label"
                                                                for="q{{ $question->id }}_{{ $i }}">
                                                                {{ $i }} -
                                                                {{ $question->choice_descriptions[$i] ?? '' }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                @elseif ($question->question_type === 'text')
                                                    <textarea name="answers[{{ $question->id }}]" rows="3" class="form-control" minlength="5" maxlength="100"
                                                        required placeholder="Jawaban minimal 5 kata, maksimal 100 kata."></textarea>
                                                @endif
                                            </div>
                                        @endforeach

                                        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">Yang sudah Polling</div>
                <div class="ribbon-content mt-5 text-muted">
                    @forelse ($usersWhoPolled as $u)
                        <i class="mdi mdi-account"></i> {{ $u->name }}<br>
                    @empty
                        Belum ada yang mengisi polling.
                    @endforelse
                    <br><br>

                </div>
            </div>
        </div>
    </div>
</div>
