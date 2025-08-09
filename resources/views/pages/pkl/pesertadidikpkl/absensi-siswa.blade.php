@extends('layouts.master')
@section('title')
    @lang('translation.absensi-siswa')
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
    <!-- Rounded Ribbon -->
    <div class="row">
        <div class="col-xxl-8 col-lg-8">
            <div class="card ribbon-box border shadow-none mb-lg-4 card-height-100">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Ngabsen</div>
                    <h5 class="fs-14 text-end"></h5>
                    <div class="ribbon-content mt-4 text-muted">
                        <div class="row">
                            <div class="col-xxl-6 col-lg-6">
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

                                        <p class="text-muted">Jika anda hadir, silakan klik tombol di bawah ini untuk
                                            mencatat kehadiran.</p>

                                        <div class="mt-3 pt-2">
                                            <button id="btn-hadir" class="btn btn-info w-100"
                                                data-nis="{{ auth()->user()->nis }}" {{ $sudahHadir ? 'disabled' : '' }}>
                                                {{ $sudahHadir ? 'Sudah Absen Hadir' : 'Hadir' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-6">
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

                                        <p class="text-muted">Jika anda sakit, silakan klik tombol di bawah ini untuk
                                            mencatat status sakit.</p>

                                        <div class="mt-3 pt-2">
                                            <button id="btn-sakit" class="btn btn-success w-100"
                                                data-nis="{{ auth()->user()->nis }}" {{ $sudahSakit ? 'disabled' : '' }}>
                                                {{ $sudahSakit ? 'Sudah Absen Sakit' : 'Sakit' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-6 col-lg-6">
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

                                        <p class="text-muted">Jika anda izin, silakan klik tombol di bawah ini untuk
                                            mencatat status izin.</p>

                                        <div class="mt-3 pt-2">
                                            <button id="btn-izin" class="btn btn-warning w-100"
                                                data-nis="{{ auth()->user()->nis }}" {{ $sudahIzin ? 'disabled' : '' }}>
                                                {{ $sudahIzin ? 'Sudah Absen Izin' : 'Izin' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-6">
                                <div class="card pricing-box">
                                    <div class="card-body bg-light m-2 p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-0 fw-semibold">Alfa</h5>
                                            </div>
                                            <div class="ms-auto">
                                                <h2 class="month mb-0">0 <small class="fs-13 text-muted">kali</small></h2>
                                            </div>
                                        </div>

                                        <p class="text-muted">Jika anda Alfa, akan di tambahkan oleh pembimbing pkl anda.
                                        </p>

                                        <div class="mt-3 pt-2">
                                            <a href="javascript:void(0);" class="btn btn-danger disabled w-100">Alfa</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-4">
            <!-- Rounded Ribbon -->
            <div class="card ribbon-box border shadow-none mb-lg-2 card-height-100">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Riwayat Absensi</div>
                    <h5 class="fs-14 text-end">Jumlah Hadir : {{ $totalHadir }} x</h5>
                    <div class="ribbon-content mt-4 text-muted">
                        <div data-simplebar style="height: 450px;">
                            @if ($dataAbsensi->isEmpty())
                                <p>No users have logged in today.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataAbsensi as $index => $ngabsen)
                                            <tr
                                                class="{{ \Carbon\Carbon::parse($ngabsen->tanggal)->month === 12 ? 'bg-info-subtle' : (\Carbon\Carbon::parse($ngabsen->tanggal)->month === 1 ? 'bg-warning-subtle' : (\Carbon\Carbon::parse($ngabsen->tanggal)->month === 2 ? 'bg-success-subtle' : (\Carbon\Carbon::parse($ngabsen->tanggal)->month === 3 ? 'bg-danger-subtle' : ''))) }}">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    @php
                                                        $dayOfWeek = \Carbon\Carbon::parse($ngabsen->tanggal)
                                                            ->dayOfWeek;
                                                        $formattedDate = \Carbon\Carbon::parse(
                                                            $ngabsen->tanggal,
                                                        )->translatedFormat('l, d-m-Y');
                                                    @endphp

                                                    <span
                                                        class="{{ $dayOfWeek == 0 ? 'text-danger' : ($dayOfWeek == 6 ? 'text-info' : '') }}">
                                                        {{ $formattedDate }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        if ($ngabsen->status == 'HADIR') {
                                                            $badgeColor = 'success';
                                                        } elseif ($ngabsen->status == 'SAKIT') {
                                                            $badgeColor = 'warning';
                                                        } elseif ($ngabsen->status == 'IZIN') {
                                                            $badgeColor = 'primary';
                                                        } elseif ($ngabsen->status == 'ALFA') {
                                                            $badgeColor = 'danger';
                                                        } elseif ($ngabsen->status == 'LIBUR') {
                                                            $badgeColor = 'danger';
                                                        } else {
                                                            $badgeColor = 'secondary';
                                                        }
                                                    @endphp
                                                    <span
                                                        class="badge bg-{{ $badgeColor }}">{{ ucfirst(strtolower($ngabsen->status)) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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

                        // Reload halaman setelah absensi berhasil
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000); // Tambahkan sedikit jeda agar notifikasi terlihat
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
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
