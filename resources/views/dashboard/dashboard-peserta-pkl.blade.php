<div class="row">
    <div class="col-lg-12">
        <div class="card overflow-hidden shadow-none">
            <div class="card-body bg-primary text-white fw-semibold d-flex">
                <marquee class="fs-14">
                    {{ $message }}
                </marquee>
            </div>
        </div>
    </div>
</div>
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

                <p class="text-muted">Jika anda hadir, silakan klik tombol di bawah ini untuk mencatat kehadiran.
                </p>

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

                <p class="text-muted">Jika anda sakit, silakan klik tombol di bawah ini untuk mencatat status
                    sakit.</p>

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

                <p class="text-muted">Jika anda izin, silakan klik tombol di bawah ini untuk mencatat status izin.
                </p>

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
