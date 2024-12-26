@extends('layouts.master')
@section('title')
    @lang('translation.informasi')
@endsection
@section('css')
    {{-- --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.administrator')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Custom DataLabels Bar</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="custom_datalabels_bar"
                        data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-primary", "--vz-success", "--vz-secondary"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->

            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Realtimes Charts</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="line_chart_realtime_by_kompetensi"
                        data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div> <!--end col-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Line & Column Charts</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="line_column_chart_by_kompetensi"
                        data-colors='["--vz-primary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        // get colors array from the string
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

        var chartDatalabelsBarColors = getChartColorsArray("custom_datalabels_bar");
        if (chartDatalabelsBarColors) {
            var options = {
                series: [{
                    data: @json($seriesData) // Data dari controller
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
                    categories: @json($categories), // Kategori dari controller
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                title: {
                    text: 'Custom DataLabels',
                    align: 'center',
                    floating: true,
                    style: {
                        fontWeight: 500,
                    },
                },
                subtitle: {
                    text: 'Category Names as DataLabels inside bars',
                    align: 'center',
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function() {
                                return '';
                            }
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#custom_datalabels_bar"), options);
            chart.render();
        }

        var linechartrealtimeColors = getChartColorsArray("line_chart_realtime_by_kompetensi");
        if (linechartrealtimeColors) {
            var options = {
                series: [
                    @foreach ($groupedData as $kompetensi => $data)
                        {
                            name: "{{ $kompetensi }}",
                            data: @json($data)
                        },
                    @endforeach
                ],
                chart: {
                    id: 'realtime-by-competency',
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
                    text: 'Dynamic Chart by Competency',
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
                    title: {
                        text: 'Tanggal'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Hadir'
                    }
                },
                legend: {
                    show: true
                },
            };

            var charts = new ApexCharts(document.querySelector("#line_chart_realtime_by_kompetensi"), options);
            charts.render();
        }

        var chartLineColumnColors = getChartColorsArray("line_column_chart_by_kompetensi");
        if (chartLineColumnColors) {
            var options = {
                series: [
                    @foreach ($groupedColumnData as $kompetensi => $data)
                        {
                            name: "{{ $kompetensi }} (Column)",
                            type: 'column',
                            data: @json($data)
                        },
                    @endforeach {
                        name: "Total Kehadiran (Line)",
                        type: 'line',
                        data: @json($lineData)
                    }
                ],
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                    toolbar: {
                        show: false,
                    }
                },
                stroke: {
                    width: [0, 2],
                    curve: 'smooth'
                },
                title: {
                    text: 'Kehadiran per Kompetensi',
                    style: {
                        fontWeight: 500,
                    },
                },
                dataLabels: {
                    enabled: true,
                    enabledOnSeries: [1]
                },
                labels: [
                    @foreach ($lineData as $data)
                        "{{ $data['x'] }}",
                    @endforeach
                ],
                xaxis: {
                    type: 'datetime'
                },
                yaxis: [{
                    title: {
                        text: 'Jumlah Kehadiran',
                        style: {
                            fontWeight: 500,
                        },
                    },
                }, {
                    opposite: true,
                    title: {
                        text: 'Total Kehadiran',
                        style: {
                            fontWeight: 500,
                        },
                    }
                }],
                colors: chartLineColumnColors
            };

            var chart = new ApexCharts(document.querySelector("#line_column_chart_by_kompetensi"), options);
            chart.render();
        }
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
