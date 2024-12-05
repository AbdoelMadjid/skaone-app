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
            @lang('translation.pesertadidikpkl')
        @endslot
    @endcomponent
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

                    <p class="text-muted">Jika anda hadir, silakan klik tombol di bawah ini untuk mencatat kehadiran.</p>

                    <div class="mt-3 pt-2">
                        <button id="btn-hadir" class="btn btn-info w-100" data-nis="{{ auth()->user()->nis }}"
                            {{ $sudahHadir ? 'disabled' : '' }}>
                            {{ $sudahHadir ? 'Sudah Absen Hadir' : 'Hadir' }}
                        </button>
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

                    <p class="text-muted">Jika anda sakit, silakan klik tombol di bawah ini untuk mencatat status sakit.</p>

                    <div class="mt-3 pt-2">
                        <button id="btn-sakit" class="btn btn-success w-100" data-nis="{{ auth()->user()->nis }}"
                            {{ $sudahSakit ? 'disabled' : '' }}>
                            {{ $sudahSakit ? 'Sudah Absen Sakit' : 'Sakit' }}
                        </button>
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

                    <p class="text-muted">Jika anda izin, silakan klik tombol di bawah ini untuk mencatat status izin.</p>

                    <div class="mt-3 pt-2">
                        <button id="btn-izin" class="btn btn-warning w-100" data-nis="{{ auth()->user()->nis }}"
                            {{ $sudahIzin ? 'disabled' : '' }}>
                            {{ $sudahIzin ? 'Sudah Absen Izin' : 'Izin' }}
                        </button>
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
                            <h2 class="month mb-0">0 <small class="fs-13 text-muted">kali</small></h2>
                        </div>
                    </div>

                    <p class="text-muted">Jika anda Alfa, akan di tambahkan oleh pembimbing pkl anda. </p>

                    <div class="mt-3 pt-2">
                        <a href="javascript:void(0);" class="btn btn-danger disabled w-100">Alfa</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-header bg-primary-subtle">
                    <h4 class="card-title mb-0">Riwayat Absensi </h4>
                </div><!-- end card header -->
                <div class="card-body bg-info-subtle">
                    @if ($dataAbsensi->isEmpty())
                        <p>No users have logged in today.</p>
                    @else
                        <div class="row">
                            @foreach ($dataAbsensi->chunk(2) as $riwayatAbsen)
                                <div class="row">
                                    @foreach ($riwayatAbsen as $ngabsen)
                                        <div class="col-md-6">
                                            <div
                                                class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                                <p class="fw-medium mb-0"><i
                                                        class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                    {{ $ngabsen->tanggal }}</p>
                                                <div>
                                                    <span
                                                        class="text-success fw-medium fs-12">{{ $ngabsen->status }}</span>
                                                </div>
                                            </div><!-- end -->
                                        </div><!-- end col -->
                                    @endforeach
                                </div><!-- end row -->
                            @endforeach
                        </div>
                    @endif
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>
@endsection
@section('script')
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
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
