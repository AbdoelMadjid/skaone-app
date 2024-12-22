@extends('layouts.master-without-nav')
@section('title')
    Welcome
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('build/libs/glightbox/css/glightbox.min.css') }}">
@endsection
@section('body')

    <body data-bs-spy="scroll" data-bs-target="#navbar-example">
    @endsection
    @section('content')
        <!-- Begin page -->
        <div class="layout-wrapper landing">
            <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="{{ URL::asset('images/sakola/logo.png') }}" class="card-logo card-logo-dark"
                            alt="logo dark" height="75">
                        <img src="{{ URL::asset('build/images/logolcks-blue.png') }}" class="card-logo card-logo-light"
                            alt="logo light" height="17">
                    </a>
                    <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                            <li class="nav-item">
                                <a class="nav-link active" href="#hero">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#visimisi">Visi & Misi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#prodi">Program Studi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#profil">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#features">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#galery">Galery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#team">Team</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li> --}}
                        </ul>

                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                                @else
                                    <a href="{{ route('auth', 'login') }}" class="btn btn-primary">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('auth', 'register') }}" class="btn btn-primary">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>

                </div>
            </nav>
            <!-- end navbar -->
            <div class="vertical-overlay" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent.show"></div>

            <!-- start hero section -->
            <section class="section pb-0 hero-section" id="hero">
                <div class="bg-overlay bg-overlay-pattern"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-10">
                            <div class="text-center mt-lg-5 pt-5">
                                <h1 class="display-6 fw-semibold mb-1 lh-base">Welcome to <span
                                        class="text-success">{{ $profileApp->app_nama ?? '' }} </span></h1>
                                <h2 class="display-6 fw-semibold mb-3 lh-base">
                                    <span class="text-primary">{{ $activeTahunAjaran->tahunajaran ?? 'Tidak Ada' }}
                                        {{ $activeSemester->semester ?? 'Tidak Ada' }}
                                    </span>
                                </h2>
                                <p class="lead text-muted lh-base">Aplikasi Laporan Capaian Kompetensi Siswa (Capaian
                                    Pembelajaran) <br>Informasi Sekolah SMKN 1 Kadipaten</p>

                                <div class="d-flex gap-2 justify-content-center mt-4">
                                    @if (Route::has('login'))
                                        <div class="">
                                            @auth
                                                <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>
                                            @else
                                                <a href="{{ route('auth', 'login') }}" class="btn btn-danger">Get Started <i
                                                        class="ri-arrow-right-line align-middle ms-1"></i></a>
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-4 mt-sm-5 pt-sm-5 mb-sm-n5 demo-carousel">
                                <div class="demo-img-patten-top d-none d-sm-block">
                                    <img src="{{ URL::asset('build/images/landing/img-pattern.png') }}"
                                        class="d-block img-fluid" alt="...">
                                </div>
                                <div class="demo-img-patten-bottom d-none d-sm-block">
                                    <img src="{{ URL::asset('build/images/landing/img-pattern.png') }}"
                                        class="d-block img-fluid" alt="...">
                                </div>
                                <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                        @foreach ($photoSlides as $index => $slide)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                                                data-bs-interval="{{ $slide->interval }}">
                                                <img src="{{ asset('images/photoslide/' . $slide->gambar) }}"
                                                    class="d-block w-100" alt="{{ $slide->alt_text ?? 'Photo Slide' }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end shape -->
            </section>
            <!-- end hero section -->


            <!-- end client section -->
            <div class="pt-5 mt-5"></div>

            <section class="section pb-3" id="visimisi">
                @include('welcome.visimisi')</section>

            <section class="section pb-3" id="prodi">
                @include('welcome.prodi')</section>

            <section class="section pb-3" id="profil">
                @include('welcome.profil')</section>

            <section class="section pb-3 bg-light" id="features">
                @include('welcome.features')</section>

            <section class="section pb-3" id="galery">
                @include('welcome.galery')</section>

            <section class="section pb-3 bg-light" id="team">
                @include('welcome.team')</section>

            {{-- <section class="section pb-3" id="contact">
                @include('welcome.contact')</section> --}}


            <!-- Start footer -->
            @include('welcome.footer')
            <!-- end footer -->

            <!--start back-to-top-->
            <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
                <i class="ri-arrow-up-line"></i>
            </button>
            <!--end back-to-top-->

        </div>
    </body>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        function getChartColorsArray(chartId) {
            if (document.getElementById(chartId) !== null) {
                var colors = document.getElementById(chartId).getAttribute("data-colors");
                colors = JSON.parse(colors);
                return colors.map(function(value) {
                    var newValue = value.replace(" ", "");
                    if (newValue.indexOf(",") === -1) {
                        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                        if (color) return color;
                        else return newValue;;
                    } else {
                        var val = value.split(',');
                        if (val.length == 2) {
                            var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                            rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                            return rgbaColor;
                        } else {
                            return newValue;
                        }
                    }
                });
            }
        }

        //jjj
        var chartDatalabelsBarColors = getChartColorsArray("custom_datalabels_bar");

        // Ambil data dari controller
        var personilCategories = @json($dataPersonil->keys());
        var personilSeries = @json($dataPersonil->values());

        if (chartDatalabelsBarColors) {
            var options = {
                series: [{
                    data: personilSeries
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        barHeight: '100%',
                        distributed: true,
                        horizontal: true,
                        dataLabels: {
                            position: 'bottom'
                        },
                    }
                },
                colors: chartDatalabelsBarColors,
                dataLabels: {
                    enabled: true,
                    textAnchor: 'start',
                    style: {
                        colors: ['#fff']
                    },
                    formatter: function(val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val;
                    },
                    offsetX: 0,
                    dropShadow: {
                        enabled: false
                    }
                },
                stroke: {
                    width: 1,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: personilCategories,
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function() {
                                return ''
                            }
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#custom_datalabels_bar"), options);
            chart.render();
        }


        var chartColumnColors = getChartColorsArray("column_chart");
        if (chartColumnColors) {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '45%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Laki-laki',
                    data: [{{ $totalGuruLakiLaki }}, {{ $totalTataUsahaLakiLaki }}]
                }, {
                    name: 'Perempuan',
                    data: [{{ $totalGuruPerempuan }}, {{ $totalTataUsahaPerempuan }}]
                }],
                colors: chartColumnColors,
                xaxis: {
                    categories: ['Guru', 'Tata Usaha'],
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Personil'
                    }
                },
                grid: {
                    borderColor: '#f1f1f1',
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " Personil"
                        }
                    }
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#column_chart"),
                options
            );

            chart.render();
        }


        // rentang usia
        var chartRadialbarMultipleColors = getChartColorsArray("multiple_radialbar");
        if (chartRadialbarMultipleColors) {
            var options = {
                series: [
                    {{ $dataUsia['<25'] }},
                    {{ $dataUsia['25-35'] }},
                    {{ $dataUsia['35-45'] }},
                    {{ $dataUsia['45-55'] }},
                    {{ $dataUsia['55+'] }}
                ],
                chart: {
                    height: 350,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        dataLabels: {
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function(w) {
                                    return {{ $totalPersonil }};
                                }
                            }
                        }
                    }
                },
                labels: ['<25', '25-35', '35-45', '45-55', '55+'],
                colors: chartRadialbarMultipleColors
            };

            var chart = new ApexCharts(document.querySelector("#multiple_radialbar"), options);
            chart.render();
        }


        // siswa per kk per tahun-masuk
        var chartColumnColors = getChartColorsArray("column_chart_pd_kk_th");
        if (chartColumnColors) {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '45%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [
                    @foreach ($dataByKodeKK as $kodeKK => $data)
                    {
                        name: '{{ $kodeKK }}',
                        data: @json($data)
                    }, @endforeach
                ],
                colors: chartColumnColors,
                xaxis: {
                    categories: @json($thnajaranMasuk),
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Peserta Didik'
                    }
                },
                grid: {
                    borderColor: '#f1f1f1',
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " Peserta Didik"
                        }
                    }
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#column_chart_pd_kk_th"),
                options
            );

            chart.render();
        }


        // siswa pertingkat per kk per tahun ajaran
        var chartDatalabelsBarColors = getChartColorsArray("custom_datalabels_bar_tingkat_tahunajaran");

        // Ambil data dari controller
        var pesertaDidikCategories = @json($pesertaDidikCategories);
        var pesertaDidikSeries = @json($pesertaDidikSeries);

        if (chartDatalabelsBarColors) {
            var options = {
                series: [{
                    data: pesertaDidikSeries
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        barHeight: '100%',
                        distributed: true,
                        horizontal: true,
                        dataLabels: {
                            position: 'bottom'
                        },
                    }
                },
                colors: chartDatalabelsBarColors,
                dataLabels: {
                    enabled: true,
                    textAnchor: 'start',
                    style: {
                        colors: ['#fff']
                    },
                    formatter: function(val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val;
                    },
                    offsetX: 0,
                    dropShadow: {
                        enabled: false
                    }
                },
                stroke: {
                    width: 1,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: pesertaDidikCategories,
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function() {
                                return ''
                            }
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#custom_datalabels_bar_tingkat_tahunajaran"), options);
            chart.render();
        }

        var linechartrealtimeColors = getChartColorsArray("login_chart_realtime");
        if (linechartrealtimeColors) {

            const chartData = @json($chartData);

            var options = {
                series: [{
                    data: chartData
                }],
                chart: {
                    id: 'realtime',
                    height: 350,
                    type: 'line',
                    animations: {
                        enabled: true,
                        easing: 'linear',
                        dynamicAnimation: {
                            speed: 1000
                        }
                    },
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'Dynamic Updating Chart',
                    align: 'left',
                    style: {
                        fontWeight: 500,
                    },
                },
                markers: {
                    size: 0
                },
                colors: linechartrealtimeColors,
                xaxis: {
                    type: 'datetime',
                    range: 28 * 24 * 60 * 60 * 1000,
                },
                yaxis: {
                    max: Math.max(...chartData.map(d => d.y)) + 10 // Y-axis menyesuaikan
                },
                legend: {
                    show: false
                },
            };

            var charts = new ApexCharts(document.querySelector("#login_chart_realtime"), options);
            charts.render();
        }
    </script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/landing.init.js') }}"></script>
@endsection
