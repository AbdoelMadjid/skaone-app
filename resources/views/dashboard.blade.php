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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/counterup2/1.0.7/index.js"></script>
    <script>
        function fetchDashboardStats() {
            $.ajax({
                url: '/dashboard-stats',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const updateCounter = (selector, value) => {
                        $(selector).attr('data-target', value).text(value);
                        CounterUp($(selector)[0], {
                            duration: 2000
                        });
                    };

                    // Update dan animasi angka
                    updateCounter('.active-user', data.activeUsersCount);
                    updateCounter('.login-today', data.loginTodayCount);
                    updateCounter('.login-count', data.loginCount);
                },
                error: function(error) {
                    console.error('Error fetching dashboard stats:', error);
                }
            });
        }

        $(document).ready(function() {
            fetchDashboardStats();
            setInterval(fetchDashboardStats, 5000);
        });
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
