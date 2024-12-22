<section class="section bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h3 class="mb-3 fw-semibold">Data user sedang <span class="text-danger">LOGIN</span></h3>
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
                                            <h2 class="mb-0"><span class="counter-value"
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
                                            <h2 class="mb-0"><span class="counter-value"
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
                                            <h2 class="mb-0"><span class="counter-value"
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
            <div class="col-xl-12 col-md-12">
                <!-- Rounded Ribbon -->
                <div class="card ribbon-box border shadow-none mb-lg-4">
                    <div class="card-body">
                        <div class="ribbon ribbon-info round-shape">Statistik Login</div>
                        <div class="ribbon-content mt-5 text-muted">
                            <div id="login_chart_realtime" data-colors='["--vz-info"]' class="apex-charts"
                                dir="ltr">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Route::has('login'))
            @auth
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ribbon-box border shadow-none mb-lg-4">
                            <div class="card-body">
                                <div class="ribbon ribbon-info round-shape">User sedang login</div>
                                <div class="ribbon-content mt-4 text-muted">
                                    @if ($activeUsers->isEmpty())
                                        <p>No users are currently logged in.</p>
                                    @else
                                        @foreach ($activeUsers->chunk(6) as $userRow)
                                            <div class="row">
                                                @foreach ($userRow as $user)
                                                    <div class="col-md-4">
                                                        <x-variasi-list>
                                                            {{ $user->name }} ({{ $user->login_count }})
                                                        </x-variasi-list>
                                                    </div><!-- end col -->
                                                @endforeach
                                            </div><!-- end row -->
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Rounded Ribbon -->
                        <div class="card ribbon-box border shadow-none mb-lg-4">
                            <div class="card-body">
                                <div class="ribbon ribbon-info round-shape">User login hari ini</div>
                                <div class="ribbon-content mt-4 text-muted">
                                    @if ($userLoginHariini->isEmpty())
                                        <p>No users have logged in today.</p>
                                    @else
                                        @foreach ($userLoginHariini->chunk(6) as $userRow)
                                            <div class="row">
                                                @foreach ($userRow as $user)
                                                    <div class="col-md-4">
                                                        <x-variasi-list>
                                                            {{ $user->name }} ({{ $user->login_count }})
                                                        </x-variasi-list>
                                                    </div><!-- end col -->
                                                @endforeach
                                            </div><!-- end row -->
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">User Login</h4>
                            </div><!-- end card header -->
                            @php
                                $ploginhariini = ($loginTodayCount / 5000) * 100;
                                $jumlahsemualogin = ($loginCount / 5000) * 100;
                            @endphp
                            <div class="card-body">
                                <!-- Rounded Ribbon -->
                                <div class="d-flex align-items-center pb-2 mb-4">
                                    <div class="flex-grow-1">
                                        <div class="progress animated-progress custom-progress progress-label">
                                            <div class="progress-bar bg-primary progress-xl" role="progressbar"
                                                style="width: {{ $ploginhariini }}%" aria-valuenow="{{ $ploginhariini }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <div class="label">Login hari ini : {{ $loginTodayCount }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-2">
                                    <div class="flex-grow-1">
                                        <div class="progress animated-progress custom-progress progress-label progress-xl">
                                            <div class="progress-bar bg-danger progress-xl" role="progressbar"
                                                style="width: {{ $jumlahsemualogin }}%"
                                                aria-valuenow="{{ $jumlahsemualogin }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="label">Total Login : {{ $loginCount }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>

                    <!-- end col -->
                </div>
            @else
            @endauth
        @endif
        <!-- end row -->
    </div>
</section>
