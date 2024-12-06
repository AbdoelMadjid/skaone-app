<div class="row">
    <div class="col-xl-4 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">User Sedang Login</div>
                <div class="ribbon-content mt-5 text-muted">
                    @if ($activeUsers->isEmpty())
                        <p>No users are currently logged in.</p>
                    @else
                        @foreach ($activeUsers->chunk(25) as $userChunk2)
                            <div class="col-md">
                                @foreach ($userChunk2 as $user)
                                    <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
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
        <!-- Ribbon Shape -->
        <div class="card ribbon-box border shadow-none mb-lg-0">
            <div class="card-body">
                <div class="ribbon ribbon-danger ribbon-shape">Ulang Tahun Bulan Ini</div>
                <div class="ribbon-content text-muted mt-5">
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
    <div class="col-xl-8 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-2">
            <div class="card-body">
                <div class="ribbon ribbon-primary round-shape">Personil Sekolah Login Hari ini</div>
                <div class="ribbon-content mt-5 text-muted">
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
                                                    @if ($user->avatar == 'personil.jpg' || $user->avatar == 'siswacewek.png' || $user->avatar == 'siswacowok.png')
                                                        <img src="{{ URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                            alt="" class="avatar-xs rounded-circle me-2">
                                                    @else
                                                        <img src="{{ URL::asset('images/thumbnail/' . $user->avatar . '') }}"
                                                            alt="" class="avatar-xs rounded-circle me-2">
                                                    @endif
                                                    @if ($user->personal_id)
                                                        {{ str_replace('Pgw_', '', $user->personal_id) }} -
                                                    @else
                                                        {{ $user->nis }} -
                                                    @endif
                                                    {!! $user->name !!}
                                                </p>
                                                <div>
                                                    <span class="text-success fw-medium fs-12">{{ $user->login_count }}
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
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-0">
            <div class="card-body">
                <div class="ribbon ribbon-primary round-shape">Peserta Didik Login Hari ini</div>
                <div class="ribbon-content mt-5 text-muted">
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
                                                    <span class="text-success fw-medium fs-12">{{ $user->login_count }}
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

<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Jenis Personil</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="custom_datalabels_bar"
                    data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-primary", "--vz-success", "--vz-secondary"]'
                    class="apex-charts" dir="ltr"></div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Jenis Personil berdasar Jenis Kelamin</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="column_chart" data-colors='["--vz-danger", "--vz-primary", "--vz-success"]' class="apex-charts"
                    dir="ltr"></div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Rentang Usia</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="multiple_radialbar"
                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]' class="apex-charts"
                    dir="ltr"></div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
</div> <!-- end row-->
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Peserta Didik Per KK Per Tahun Ajaran Masuk</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="column_chart_pd_kk_th"
                    data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-primary", "--vz-success", "--vz-secondary"]'
                    class="apex-charts" dir="ltr"></div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Peserta Didik Per Tingkat Per Tahun Ajaran</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="custom_datalabels_bar_tingkat_tahunajaran"
                    data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-primary", "--vz-success", "--vz-secondary"]'
                    class="apex-charts" dir="ltr"></div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
</div>
