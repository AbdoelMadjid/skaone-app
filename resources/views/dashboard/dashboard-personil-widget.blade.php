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
                            <h2 class="mb-0"><span class="counter-value" data-target="{{ $jumlahPersonil }}">0</span>
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
                            <h2 class="mb-0"><span class="counter-value" data-target="{{ $jumlahPD }}">0</span>
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
