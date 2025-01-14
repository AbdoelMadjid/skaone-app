<!-- right offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"><i data-feather="check-circle" class="text-success icon-dual-success icon-xs"></i>
            PENGUMUMAN / INFORMASI</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if ($pengumumanHariIni->isEmpty())
            <div class="card ribbon-box border shadow-none right mb-lg-3">
                <div class="card-body">
                    <div class="ribbon ribbon-info round-shape">Informasi Hari ini</div>
                    <h5 class="fs-14 text-start"></h5>
                    <div class="ribbon-content mt-5">
                        <p class="mb-4 mt-4">Tidak ada pengumuman / informasi hari ini </p>
                    </div>
                </div>
            </div>
        @else
            <div class="card ribbon-box border shadow-none right mb-lg-3">
                <div class="card-body">
                    <div class="ribbon ribbon-info round-shape">Informasi Hari ini</div>
                    <h5 class="fs-14 text-start"></h5>
                    <div class="ribbon-content mt-4">
                        @foreach ($pengumumanHariIni as $pengumuman)
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i data-feather="check-circle" class="text-success icon-dual-success icon-xs"></i>
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
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 510px);">
                        @foreach ($pengumumanAll as $pengumuman)
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i data-feather="check-circle" class="text-success icon-dual-success icon-xs"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="text-info">{{ $pengumuman->judul }}</h5>
                                    <p class="mb-0">{{ $pengumuman->tanggal }}</p>
                                    <p class="mb-2">{{ $pengumuman->isi }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
