@extends('layouts.master')
@section('title')
    @lang('translation.homepage')
@endsection
@section('css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-warning-subtle">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-2">
                            <div class="col-md">
                                <div class="row align-items-center g-4">
                                    <div class="col-md-auto">
                                        <div class="avatar-xl">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{ Auth::user()->avatar_url }}" alt="User Avatar"
                                                    class="img-thumbnail rounded-circle avatar-xl ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold">{!! renderGreeting() !!}, {!! Auth::user()->name !!}!</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><span class="fw-medium">{!! renderDate() !!}</span></div>
                                                <div class="vr"></div>
                                                <div><span class="fw-medium"
                                                        id="titlehomepage">{!! renderTime('titlehomepage') !!}</span></div>
                                                <div class="vr"></div>
                                            </div>
                                        </div>
                                        Anda sudah login sebanyak : <span
                                            class="badge rounded-pill bg-danger">{{ Auth::user()->login_count }}
                                        </span> kali
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="hstack gap-2 flex-wrap mt-2">
                                    {!! str_replace(', ', '<br>', $aingPengguna->role_labels) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    @if (auth()->check() &&
            auth()->user()->hasAnyRole(['siswa']))
        @include('dashboard.dashboard-siswa')
    @else
        @include('dashboard.dashboard-personil')
    @endif
    @if (auth()->check() && auth()->user()->hasRole('pesertapkl'))
        @include('dashboard.dashboard-peserta-pkl')
    @endif
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
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
                title: {
                    text: 'Jumlah Peserta Didik per Rombel Tingkat dan Tahun Ajaran',
                    align: 'center',
                    floating: true,
                    style: {
                        fontWeight: 500,
                    },
                },
                subtitle: {
                    text: 'Jumlah Peserta Didik yang Ditempatkan per Kategori',
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
                                return ''
                            }
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#custom_datalabels_bar_tingkat_tahunajaran"), options);
            chart.render();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const nis = '{{ auth()->user()->nis }}'; // Pastikan ini adalah NIS dari pengguna yang login

            // Memeriksa status absensi hari ini
            fetch('{{ route('pesertadidikpkl.absensi-siswa.check-absensi-status') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        nis
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Cek jika sudah absen hari ini
                    if (data.sudahHadir) {
                        disableButton('btn-hadir');
                        disableButton('btn-sakit');
                        disableButton('btn-izin');
                    } else if (data.sudahSakit) {
                        disableButton('btn-hadir');
                        disableButton('btn-sakit');
                        disableButton('btn-izin');
                    } else if (data.sudahIzin) {
                        disableButton('btn-hadir');
                        disableButton('btn-sakit');
                        disableButton('btn-izin');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // Fungsi untuk menonaktifkan tombol
        function disableButton(buttonId) {
            const button = document.getElementById(buttonId);
            if (button) {
                button.disabled = true;
                button.innerText = `Sudah Absen`;
            }
        }

        // Fungsi untuk menangani klik tombol absensi (HADIR, SAKIT, IZIN)
        function handleAbsensiButtonClick(buttonId, route, messageKey, totalKey, disableOtherButtons) {
            document.getElementById(buttonId)?.addEventListener('click', function() {
                const nis = this.getAttribute('data-nis');
                const button = this;

                // Melakukan request absensi
                fetch(route, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            nis
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Cek apakah absensi sudah dilakukan sebelumnya
                        if (data[messageKey]) {
                            showToast('success', data.message);
                            button.disabled = true; // Menonaktifkan tombol yang diklik
                            button.innerText =
                                `Sudah Absen ${messageKey.charAt(0).toUpperCase() + messageKey.slice(1)}`;
                        } else {
                            showToast('success', data.message);

                            // Update total absensi di UI
                            const totalElem = document.getElementById(totalKey);
                            const currentTotal = parseInt(totalElem.innerText) || 0;
                            totalElem.innerHTML =
                                `${currentTotal + 1} <small class="fs-13 text-muted">kali</small>`;

                            button.disabled = true; // Menonaktifkan tombol yang diklik
                            button.innerText =
                                `Sudah Absen ${messageKey.charAt(0).toUpperCase() + messageKey.slice(1)}`;
                        }

                        // Menonaktifkan tombol lain setelah absensi berhasil
                        disableOtherButtons.forEach(buttonIdToDisable => {
                            const otherButton = document.getElementById(buttonIdToDisable);
                            if (otherButton) {
                                otherButton.disabled = true; // Nonaktifkan tombol lain
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('error', 'Terjadi kesalahan saat mengirim data.');
                    });
            });
        }

        // Panggil fungsi untuk setiap tombol absensi dan tentukan tombol lain yang harus dinonaktifkan
        handleAbsensiButtonClick(
            'btn-hadir',
            '{{ route('pesertadidikpkl.absensi-siswa.simpanhadir') }}',
            'hadir',
            'total-hadir',
            ['btn-sakit', 'btn-izin']
        );
        handleAbsensiButtonClick(
            'btn-sakit',
            '{{ route('pesertadidikpkl.absensi-siswa.simpansakit') }}',
            'sakit',
            'total-sakit',
            ['btn-hadir', 'btn-izin']
        );
        handleAbsensiButtonClick(
            'btn-izin',
            '{{ route('pesertadidikpkl.absensi-siswa.simpanizin') }}',
            'izin',
            'total-izin',
            ['btn-hadir', 'btn-sakit']
        );
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
