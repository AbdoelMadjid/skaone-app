@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Teacher and Staff
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="g-bg-img-hero g-bg-cover g-bg-black-opacity-0_3--after"
        style="background-image: url({{ URL::asset('images/sakola/misisekolah5.jpg') }});">
        <div class="container g-pos-rel g-z-index-1 g-pt-80 g-pb-150">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 col-lg-5 g-mb-30">
                    <h1 class="g-color-white g-font-size-40--md mb-4">Teacher and Staff</h1>
                    <p class="g-color-white-opacity-0_9 g-font-size-20--md">Leadership through excellence in teaching and
                        research. We offer the broadest academic program of any
                        school in Majalengka.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Find a Course -->
    <div class="g-bg-img-hero g-bg-pos-top-center g-pos-rel g-z-index-1 g-mt-minus-150"
        style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg4.svg') }});">
        <div class="container g-pt-150 g-pb-30">
            <!-- Heading -->
            {{--  <div class="g-max-width-645 text-center mx-auto g-mb-60">
                <h2 class="h1 mb-0">Teacher and Staff</h2>
                <span class="d-block g-font-size-18 mb-0">Discover 100+ of our events</span>
            </div> --}}
            <!-- End Heading -->
            <div class="row">
                <!-- Studies -->
                <article class="col-md-6 g-mb-30">
                    <div class="g-mb-35">
                        <h3 class="mb-3">Jenis Personil Sekolah</h3>
                        <p class="g-font-size-15"><img class="img-fluid"
                                src="{{ URL::asset('images/sakola/misisekolah5.jpg') }}" alt="Image Description"></p>
                    </div>
                    <div class="g-mb-30">
                        <div id="custom_datalabels_bar"
                            data-colors='["#66DA26", "#F44336", "#9C27B0", "#E91E63", "#2E93fA", "#546E7A", "#FF9800", "#9C27B0", "#66DA26", "#F44336"]'
                            class="apex-charts" dir="ltr"></div>
                    </div>
                </article>
                <!-- End Studies -->

                <!-- Studies -->
                <article class="col-md-6 g-mb-30">
                    <div class="g-mb-35">
                        <h3 class="mb-3">Personil Sekolah berdasar Jenis Kelamin</h3>
                        <p class="g-font-size-15"><img class="img-fluid"
                                src="{{ URL::asset('images/sakola/salamsapasenyum.jpg') }}" alt="Image Description"></p>
                    </div>
                    <div class="g-mb-30">

                        <div id="column_chart" data-colors='["#2E93fA", "#E91E63", "#FF9800"]' class="apex-charts"
                            dir="ltr"></div>
                    </div>
                </article>
                <!-- End Studies -->
            </div>
        </div>
    </div>
    <!-- End Find a Course -->
    <!-- End Promo Block -->
    {{--  <div class="g-bg-img-hero g-bg-cover g-bg-black-opacity-0_3--after"
        style="background-image: url({{ URL::asset('images/sakola/misisekolah5.jpg') }});">
        <div class="container g-pos-rel g-z-index-1 g-pt-80 g-pb-150">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 col-lg-5 g-mb-150">
                    <h1 class="g-color-white g-font-size-40--md mb-4">Teacher and Staff</h1>
                    <p class="g-color-white-opacity-0_9 g-font-size-20--md"></p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Promo Block -->

    <!-- Find a Course -->
    {{--     <div class="g-bg-img-hero g-bg-pos-top-center g-pos-rel g-z-index-1 g-mt-minus-150"
        style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg4.svg') }});">
        <div class="container g-pt-150 g-pb-30">
            <!-- Heading -->

        </div>
    </div> --}}
    <!-- End Find a Course -->
    <!-- End Promo Block -->
    <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg5.svg') }});">
        <div class="container g-py-100 g-py-150--lg">

            <!-- End Heading -->
            {{--             <div class="g-max-width-645 text-center mx-auto g-mb-30">

            </div> --}}
            <div class="g-max-width-645 text-center mx-auto g-mb-60">
                <h2 class="h1 mb-3">Teacher and Staff</h2>
                <p>Leadership through excellence in teaching and research. We offer the broadest academic program of any
                    school in Majalengka.
                </p>
            </div>
            <div class="row">
                <!-- Sidebar Tabs -->
                <div class="col-md-5">
                    <h3>Pilih Jenis Personil</h3>
                    <ul class="nav flex-column u-nav-v1-1 u-nav-primary" role="tablist"
                        data-target="nav-1-1-accordion-primary-ver" data-tabs-mobile-type="accordion"
                        data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
                        @foreach ($groupsPersonil as $index => $group)
                            <li class="nav-item">
                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" data-toggle="tab"
                                    href="#tab-{{ str_pad($group->no_group, 2, '0', STR_PAD_LEFT) }}" role="tab">
                                    <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                                    {{ ucfirst($group->nama_group) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="col-md-7">
                    <div id="nav-1-1-accordion-primary-ver" class="tab-content">
                        @foreach ($groupsPersonil as $index => $group)
                            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                id="tab-{{ str_pad($group->no_group, 2, '0', STR_PAD_LEFT) }}" role="tabpanel">

                                <h2>{{ ucfirst($group->nama_group) }}</h2>
                                <div class="row">
                                    @foreach ($personilData->where('no_group', $group->no_group) as $personil)
                                        <div class="col-sm-7 col-lg-4 g-mb-30">
                                            <div
                                                class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                                                @if ($personil->photo)
                                                    <img class="img-fluid"
                                                        src="{{ URL::asset('images/photo-personil/' . $personil->photo) }}"
                                                        alt="Image Description">
                                                @else
                                                    <img class="img-fluid"
                                                        src="{{ URL::asset('images/welcome/personil/img1.jpg') }}"
                                                        alt="Image Description">
                                                @endif
                                            </div>
                                            <p class="text-center">
                                                <span class="g-font-size-12 g-color-gray">
                                                    {{ $personil->gelardepan }}
                                                    {{ ucwords(strtolower($personil->namalengkap)) }}
                                                    {{ $personil->gelarbelakang }}</span>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </div>
    </div>


    <!-- End Studies -->
    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.popup.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
    </script>
    <script src="{{ URL::asset('build/assets/js/components/hs.cubeportfolio.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.tabs.js') }}"></script>
    <!-- JS Customization -->
    <script src="{{ URL::asset('build/assets/js/custom.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of carousel
            $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            $.HSCore.components.HSCubeportfolio.init('.cbp');

            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');

        });

        $(window).on('resize', function() {
            setTimeout(function() {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
        });
    </script>
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
    </script>
@endsection
