@extends('layouts.master')
@section('title')
    @lang('translation.kelulusan-peserta-didik')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.pesertadidik')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="alert alert-warning alert-dismissible alert-additional fade show mb-2" role="alert">
                    <div class="alert-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-information-line fs-20 text-warning"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1">Informasi Kelulusan</h5>
                                <p class="mb-0">Untuk mendapatkan kelulusan silakan di akses setelah pukul 17.00 WIB
                                    tanggal 05 Mei 2025.</p>
                            </div>
                        </div>
                        <div id="countdown">
                            <div class="row justify-content-center mt-2">
                                <div class="col-lg-12">
                                    <div class="countdownlist">
                                        <div class="countdownlist-item">
                                            <div class="count-title">Hari</div>
                                            <div class="count-num">
                                                <span id="days">{{ $diff->days }}</span>
                                            </div>
                                        </div>
                                        <div class="countdownlist-item">
                                            <div class="count-title">Jam</div>
                                            <div class="count-num">
                                                <span id="hours">{{ $diff->h }}</span>
                                            </div>
                                        </div>
                                        <div class="countdownlist-item">
                                            <div class="count-title">Menit</div>
                                            <div class="count-num">
                                                <span id="minutes">{{ $diff->i }}</span>
                                            </div>
                                        </div>
                                        <div class="countdownlist-item">
                                            <div class="count-title">Detik</div>
                                            <div class="count-num">
                                                <span id="seconds">{{ $diff->s }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <ul>
                                <li><span id="days">{{ $diff->days }}</span> Hari</li>
                                <li><span id="hours">{{ $diff->h }}</span> Jam</li>
                                <li><span id="minutes">{{ $diff->i }}</span> Menit</li>
                                <li><span id="seconds">{{ $diff->s }}</span> Detik</li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="alert-content">
                        <p class="mb-0">Scripting & Desing by. Abdul Madjid, S.Pd., M.Pd.</p>
                    </div>
                </div>

            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script>
        // Countdown dinamis menggunakan JavaScript
        function updateCountdown() {
            const startDate = new Date('May 05, 2025 16:00:00').getTime();
            const endDate = new Date('May 19, 2025 00:00:00').getTime();
            const now = new Date().getTime();
            let timeLeft;

            if (now < startDate) {
                timeLeft = startDate - now; // Waktu tersisa sampai 2 Desember 2024
            } else {
                timeLeft = endDate - now; // Waktu tersisa sampai 31 Maret 2025
            }

            if (timeLeft <= 0) {
                document.getElementById("countdown").innerHTML = "<p>Countdown Selesai!</p>";
                return;
            }

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;
        }

        // Update countdown setiap detik
        setInterval(updateCountdown, 1000);
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
