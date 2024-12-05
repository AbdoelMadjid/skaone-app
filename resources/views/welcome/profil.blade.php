<section class="section">
    <div class="container">
        <h5 class="fs-12 text-uppercase text-success">Statistik</h5>
        <h4 class="mb-3">Personil Sekolah dan Siswa</h4>

        <div class="row align-items-center gy-4">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="text-muted">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="fs-16 text-uppercase text-success">Jenis Personil Sekolah</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div id="custom_datalabels_bar"
                                data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-primary", "--vz-success", "--vz-secondary"]'
                                class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6 col-sm-7 col-10 ms-auto order-1 order-lg-2">
                <div>
                    <img src="{{ URL::asset('images/sakola/misisekolah5.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row align-items-center mt-2 pt-lg-2 gy-2">
            <div class="col-lg-6 col-sm-7 col-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ URL::asset('images/sakola/salamsapasenyum.jpg') }}" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-muted ps-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="fs-16 text-uppercase text-success">Personil Sekolah berdasar Jenis Kelamin</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="column_chart" data-colors='["--vz-danger", "--vz-primary", "--vz-success"]'
                                class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row align-items-center gy-4">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="text-muted">
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
            </div>
            <!-- end col -->
            <div class="col-lg-6 col-sm-7 col-10 ms-auto order-1 order-lg-2">
                <div>
                    <img src="{{ URL::asset('images/sakola/misisekolah.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row align-items-center mt-2 pt-lg-2 gy-2">
            <div class="col-lg-6 col-sm-7 col-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ URL::asset('images/sakola/misisekolah3.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-muted ps-lg-5">
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
            <!-- end col -->
        </div>
    </div>


</section>
