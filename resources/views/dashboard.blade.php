@extends('layouts.master')
@section('title')
    @lang('translation.homepage')
@endsection
@section('css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .fc-day-sun {
            background-color: rgb(255, 213, 213) !important;
        }

        .fc-day-sat {
            background-color: rgb(225, 240, 255) !important;
        }

        .fc-event-title {
            white-space: normal !important;
            /* Memastikan teks judul membungkus */
            overflow: visible !important;
            /* Menghindari overflow tersembunyi */
        }
    </style>
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
    {{-- @if (auth()->check() && auth()->user()->hasRole('pesertapkl'))
        @include('dashboard.dashboard-peserta-pkl')
    @endif --}}
    @if (auth()->check() && auth()->user()->hasRole('siswa'))
        @include('dashboard.dashboard-kelulusan')
    @endif
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/counterup2/1.0.7/index.js"></script>
    <script src="https://img.themesbrand.com/velzon/apexchart-js/stock-prices.js"></script>
    {{--     <script src="{{ URL::asset('build/js/pages/apexcharts-line.init.js') }}"></script> --}}
    <script>
        function fetchRealTimeStats() {
            $.ajax({
                url: '/real-time-stats', // Endpoint real-time stats
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Fungsi untuk memformat angka dengan tanda ribuan
                    const formatNumber = (number) => {
                        return parseInt(number).toLocaleString('en-US');
                    };

                    // Update pengguna aktif
                    $('#active-user')
                        .attr('data-target', data.activeUsersCount)
                        .text(formatNumber(data.activeUsersCount));

                    // Update login hari ini
                    $('#login-today')
                        .attr('data-target', data.loginTodayCount)
                        .text(formatNumber(data.loginTodayCount));

                    // Update total login
                    $('#login-count')
                        .attr('data-target', data.loginCount)
                        .text(formatNumber(data.loginCount));
                },
                error: function(error) {
                    console.error('Error fetching real-time stats:', error);
                }
            });
        }

        // Jalankan fungsi setiap 5 detik
        setInterval(fetchRealTimeStats, 5000);

        // Jalankan fungsi saat halaman pertama kali dimuat
        $(document).ready(fetchRealTimeStats);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var offcanvasRight = new bootstrap.Offcanvas(document.getElementById('offcanvasRight'));
            offcanvasRight.show();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#InfoEvenModals').modal('show');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const nis = '{{ auth()->user()->nis }}'; // Pastikan ini adalah NIS dari pengguna yang login

            // Memeriksa status absensi hari ini
            fetch('{{ route('pesertapkl.absensi-siswa.check-absensi-status') }}', {
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
            '{{ route('pesertapkl.absensi-siswa.simpanhadir') }}',
            'hadir',
            'total-hadir',
            ['btn-sakit', 'btn-izin']
        );
        handleAbsensiButtonClick(
            'btn-sakit',
            '{{ route('pesertapkl.absensi-siswa.simpansakit') }}',
            'sakit',
            'total-sakit',
            ['btn-hadir', 'btn-izin']
        );
        handleAbsensiButtonClick(
            'btn-izin',
            '{{ route('pesertapkl.absensi-siswa.simpanizin') }}',
            'izin',
            'total-izin',
            ['btn-hadir', 'btn-sakit']
        );
    </script>
    <script>
        function getChartColorsArray(chartId) {
            if (document.getElementById(chartId) !== null) {
                var colors = document.getElementById(chartId).getAttribute("data-colors");
                if (colors) {
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                events: `{{ route('websiteapp.events.list') }}`,
                editable: false,
                eventDidMount: function() {
                    // Update the event list when events are rendered
                    updateEventList(calendar.getEvents());
                }
            });
            calendar.render();

            function updateEventList(events) {
                const eventListTable = document.getElementById('event-list-table').getElementsByTagName('tbody')[0];
                eventListTable.innerHTML = ''; // Clear existing rows

                function formatDateString(date) {
                    const d = new Date(date);
                    const day = String(d.getDate()).padStart(2, '0');
                    const month = String(d.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                    const year = d.getFullYear();
                    return `${day}-${month}-${year}`;
                }

                function getCategoryClass(category) {
                    switch (category) {
                        case 'primary':
                            return 'text-primary';
                        case 'success':
                            return 'text-success';
                        case 'danger':
                            return 'text-danger';
                        case 'warning':
                            return 'text-warning';
                        case 'info':
                            return 'text-info';
                        case 'dark':
                            return 'text-dark';
                        case 'secondary':
                            return 'text-secondary';
                        case 'light':
                            return 'text-light';
                        default:
                            return '';
                    }
                }

                // Sort events by start date
                events.sort((a, b) => a.start - b.start);

                events.forEach(event => {
                    const row = eventListTable.insertRow();
                    const titleCell = row.insertCell(0);
                    const startDate = formatDateString(event.start);
                    const endDate = event.end ? formatDateString(new Date(event.end.setDate(event.end
                        .getDate() - 1))) : startDate; // Penyesuaian end_date
                    const dateCell = row.insertCell(1);

                    titleCell.innerText = event.title;
                    dateCell.innerText = (startDate === endDate) ?
                        startDate :
                        `${startDate} - ${endDate}`; // Tampilkan hanya startDate jika sama

                    // Pusatkan teks di dateCell
                    dateCell.style.textAlign = 'center';

                    // Tambahkan kelas warna Bootstrap berdasarkan kategori
                    if (event.extendedProps.category) {
                        const categoryClass = getCategoryClass(event.extendedProps.category);
                        titleCell.classList.add(categoryClass);
                    }
                    /* row.insertCell(2).innerText = event.extendedProps.category || ''; */
                });
            }
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
