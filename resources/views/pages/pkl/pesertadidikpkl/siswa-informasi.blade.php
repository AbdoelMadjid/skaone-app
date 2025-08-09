@extends('layouts.master')
@section('title')
    @lang('translation.informasi-siswa')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.pesertapkl')
        @endslot
    @endcomponent
    <div class="row dash-nft">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 lh-base mb-3">Peserta PKL : </h4>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                                    {{ $data->isNotEmpty() ? $data->first()->nama_lengkap : 'Data tidak ditemukan' }}
                                </h4>
                                <div class="d-flex gap-3 mt-4">
                                    Rombel : <br>
                                    {{ $data->isNotEmpty() ? $data->first()->rombel_nama : 'Data tidak ditemukan' }}
                                </div>
                            </div>
                            @if ($data->isNotEmpty())
                                @if ($data->first()->foto == 'siswacowok.png')
                                    <img src="{{ URL::asset('images/siswacowok.png') }}" alt="User Avatar"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                @elseif ($data->first()->foto == 'siswacewek.png')
                                    <img src="{{ URL::asset('images/siswacewek.png') }}" alt="User Avatar"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                @else
                                    <img src="{{ URL::asset('images/peserta_didik/' . $data->first()->foto) }}"
                                        alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                @endif
                            @else
                                <img src="{{ URL::asset('images/user-dummy-img.jpg') }}" alt="No Data"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @endif
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 lh-base mb-3">Guru PKL : </h4>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                                    @if ($data->isNotEmpty())
                                        @foreach ($data as $item)
                                            {{ $item->gelardepan ?? '' }} {{ $item->namalengkap }},
                                            {{ $item->gelarbelakang ?? '' }}
                                        @endforeach
                                    @else
                                        Data tidak ditemukan
                                    @endif
                                </h4>
                                <div class="d-flex gap-3 mt-4">
                                    Contact Person : <br>
                                    {{ $data->isNotEmpty() ? $data->first()->kontak_hp : 'Data tidak ditemukan' }}
                                </div>
                            </div>
                            <img src="{{ $data->isNotEmpty() && $data->first()->photo ? URL::asset('images/personil/' . $data->first()->photo) : URL::asset('images/user-dummy-img.jpg') }}"
                                alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 lh-base mb-3">Tempat Prakerin : </h4>
                                @if ($data->isNotEmpty())
                                    @foreach ($data as $item)
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                                            {{ $item->nama ?? '' }}
                                        </h4>
                                        <h4 class="fs-15 fw-semibold ff-secondary mb-0">{{ $item->alamat }}</h4>
                                    @endforeach
                                @else
                                    Data tidak ditemukan
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 lh-base mb-3">Rekapitulasi Jurnal : </h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Bulan</th>
                                            <th>Sudah</th>
                                            <th>Belum</th>
                                            <th>Tolak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($rekapJurnal as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ \Carbon\Carbon::create()->month($data->bulan)->locale('id')->monthName }}
                                                    {{ $data->tahun }}</td>
                                                <td>{{ $data->sudah }}</td>
                                                <td>{{ $data->belum }}</td>
                                                <td>{{ $data->tolak }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data tersedia</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xl-8">
                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 lh-base mb-3">Masa Pelaksanaan Prakerin : </h4>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0">02 Desember 2024 - 31 Maret
                                    2025</h4>
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
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 lh-base mb-3">Absensi : </h4>


                                <div class="row">
                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="card pricing-box">
                                            <div class="card-body bg-light m-2 p-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="flex-grow-1">
                                                        <h5 class="mb-0 fw-semibold">Hadir</h5>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <h2 class="month mb-0" id="total-hadir">{{ $totalHadir ?? 0 }}
                                                            <small class="fs-13 text-muted">kali</small>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="card pricing-box">
                                            <div class="card-body bg-light m-2 p-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="flex-grow-1">
                                                        <h5 class="mb-0 fw-semibold">Sakit</h5>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <h2 class="month mb-0" id="total-sakit">{{ $totalSakit ?? 0 }}
                                                            <small class="fs-13 text-muted">kali</small>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="card pricing-box">
                                            <div class="card-body bg-light m-2 p-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="flex-grow-1">
                                                        <h5 class="mb-0 fw-semibold">Izin</h5>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <h2 class="month mb-0" id="total-izin">{{ $totalIzin ?? 0 }}
                                                            <small class="fs-13 text-muted">kali</small>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="card pricing-box">
                                            <div class="card-body bg-light m-2 p-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="flex-grow-1">
                                                        <h5 class="mb-0 fw-semibold">Alfa</h5>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <h2 class="month mb-0">0 <small
                                                                class="fs-13 text-muted">kali</small></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 lh-base mb-3">Riwayat Jurnal : </h4>


                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">No</th>
                                            <th class="align-middle" width="100">Tanggal Kirim</th>
                                            <th class="align-middle">Element</th>
                                            <th class="align-middle">Isi TP</th>
                                            <th class="align-middle">Validasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($jurnalSiswa->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @else
                                            @foreach ($jurnalSiswa as $index => $jurnal)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($jurnal->tanggal_kirim)) }}</td>
                                                    <td>{{ $jurnal->element }}</td>
                                                    <td>{{ $jurnal->isi_tp }}</td>
                                                    <td align="center">
                                                        @if ($jurnal->validasi === 'Sudah')
                                                            <i class="ri-checkbox-fill fs-2"></i>
                                                        @elseif ($jurnal->validasi === 'Belum')
                                                            <i class="ri-checkbox-blank-line fs-2"></i>
                                                        @else
                                                            <span>-</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script>
        // Countdown dinamis menggunakan JavaScript
        function updateCountdown() {
            const startDate = new Date('December 02, 2024 00:00:00').getTime();
            const endDate = new Date('March 31, 2025 00:00:00').getTime();
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
