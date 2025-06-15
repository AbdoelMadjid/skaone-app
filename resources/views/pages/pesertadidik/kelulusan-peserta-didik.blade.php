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
                <div class="alert alert-danger alert-dismissible alert-additional fade show mb-2" role="alert">
                    <div class="alert-body">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-alert-line display-6 align-middle"></i>
                            </div>
                            @php
                                use Carbon\Carbon;

                                $now = Carbon::now('Asia/Jakarta'); // set zona waktu
                                $showButton = false;

                                // Tentukan waktu target berdasarkan kode_kk
                                if (in_array($dataRombel->kode_kk, [411, 421, 811])) {
                                    $targetTime = Carbon::create(2025, 5, 5, 18, 0, 0, 'Asia/Jakarta'); // 05 Mei 2025 pukul 18.00
                                    $waktudi_buka = '18.00';
                                } elseif (in_array($dataRombel->kode_kk, [821, 833])) {
                                    $targetTime = Carbon::create(2025, 5, 5, 17, 0, 0, 'Asia/Jakarta'); // 05 Mei 2025 pukul 17.00
                                    $waktudi_buka = '17.00';
                                } else {
                                    $targetTime = null;
                                }

                                if ($targetTime && $now->greaterThanOrEqualTo($targetTime)) {
                                    $showButton = true;
                                }
                            @endphp
                            <div class="flex-grow-1">
                                <h5 class="alert-heading">Informasi Kelulusan </h5>
                                <p class="mb-0">Untuk mendapatkan kelulusan silakan di akses setelah pukul
                                    {{ $waktudi_buka }} WIB
                                    tanggal
                                    05 Mei
                                    2025.</p>
                                {{--  <p>Rombel: {{ $dataRombel->rombel_nama }}</p>
                                <p>Tingkat: {{ $dataRombel->rombel_tingkat }}</p>
                                <p>Tingkat: {{ $dataRombel->kode_kk }}</p> --}}


                                @if ($showButton)
                                    <div class="mt-3">
                                        Cek Kelulusan di Bawah ini
                                    </div>
                                @else
                                    @if ($targetTime)
                                        <div class="mt-3">
                                            <p>Waktu tersisa:</p>
                                            <h4 id="countdown"></h4>
                                        </div>
                                        <script>
                                            const targetTime = new Date("{{ $targetTime->format('Y-m-d H:i:s') }}").getTime();

                                            const countdownEl = document.getElementById("countdown");

                                            const timer = setInterval(function() {
                                                const now = new Date().getTime();
                                                const distance = targetTime - now;

                                                if (distance <= 0) {
                                                    clearInterval(timer);
                                                    location.reload(); // Reload halaman jika waktunya tiba
                                                } else {
                                                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                    countdownEl.innerHTML = `${hours} jam ${minutes} menit ${seconds} detik`;
                                                }
                                            }, 1000);
                                        </script>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="alert-content">
                        <p class="mb-0">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</p>
                    </div>
                </div>
            </div>
            @if ($showButton)
                <div class="card">
                    <div id='cetak-keluar' style='@page {size: A4;}'>
                        <div class='table-responsive'>
                            <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style='font-size:18px;text-align:center;'><strong>SURAT KETERANGAN LULUS</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size:12px;text-align:center;'><strong>Nomor :
                                            571/TU.01.02/SMKN1KDP.CADISDIKWIL.IX</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align='center' width='50%'>
                                        <table align='center' width='70%'
                                            style='border-collapse:collapse;font:14px Times New Roman;'>
                                            <tr>
                                                <td>
                                                    Kepala SMK Negeri 1 Kadipaten. Kabupaten Majalengka selaku Penyelenggara
                                                    Kegiatan
                                                    Penilaian Akhir Jenjang Tahun Pelajaran 2024 - 2025. <br><br>
                                                    Berdasarkan:
                                                    <ol style='margin-left:-18px;'>
                                                        <li>Ketuntasan dari seluruh program pembelajaran pada Kurikulum
                                                            Merdeka;
                                                        <li>Kriteria Kelulusan dari Satuan Pendidikan sesuai dengan
                                                            peraturan
                                                            perundang-undangan
                                                            yang berlaku;
                                                        <li>Rapat Pleno Dewan Guru SMKN 1 Kadipaten. tentang Kelulusan Siswa
                                                            pada Tanggal 02
                                                            Mei 2025
                                                    </ol>
                                                    Menerangkan bahwa anda:<br><br>
                                                    @php
                                                        $lulusteu = '';

                                                        if (
                                                            strtoupper($kelulusan->status_kelulusan) ===
                                                            'LULUS DI TANGGUHKAN'
                                                        ) {
                                                            $lulusteu = 'bg-warning';
                                                        } else {
                                                            $lulusteu = 'bg-success';
                                                        }

                                                    @endphp
                                                    <h5 class="text-center">
                                                        <span class="badge {{ $lulusteu }} text-dark"
                                                            style="font-size: 20px">

                                                            {{ ucfirst($kelulusan->status_kelulusan) }}
                                                        </span>
                                                    </h5>
                                                    <br><br>
                                                </td>
                                            </tr>
                                            <table align='center' width='70%'
                                                style='border-collapse:collapse;font:14px Times New Roman;'>
                                                <tr>
                                                    <td>
                                                        @php
                                                            $keterangan = '';

                                                            if (
                                                                strtoupper($kelulusan->status_kelulusan) ===
                                                                'LULUS DI TANGGUHKAN'
                                                            ) {
                                                                $keterangan =
                                                                    'Bagi yang LULUS DITANGGUHKAN, silakan untuk melakukan perbaikan sampai dengan tanggal 07 Mei 2025 dengan sebelumnya menghubungi ketua program studi masing-masing.';
                                                            }

                                                        @endphp
                                                        <p>Untuk dokumen <strong>SKL (Surat Keterangan Lulus), Transkrip
                                                                Nilai,
                                                            </strong> dapat di
                                                            unduh di halaman Transkip Nilai mulai tanggal 08 Mei 2025</p>
                                                        <p><strong>{{ $keterangan }}</strong></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                Kelulusan belum dapat diakses, silakan tunggu hingga waktu yang ditentukan.
            @endif
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
