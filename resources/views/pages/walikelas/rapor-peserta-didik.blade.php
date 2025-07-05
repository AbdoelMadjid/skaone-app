@extends('layouts.master')
@section('title')
    @lang('translation.rapor-peserta-didik')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .cetak-rapor {
            border-collapse: collapse;
            /* Menggabungkan garis border */
            width: 100%;
            /* Agar tabel mengambil seluruh lebar */
        }

        .cetak-rapor th,
        .cetak-rapor td {
            border: 1px solid black;
            /* Memberikan garis hitam pada semua th dan td */
            padding: 8px;
            /* Memberikan jarak dalam sel */
            text-align: left;
            /* Mengatur teks rata kiri */
        }

        .cetak-rapor th {
            background-color: #f2f2f2;
            /* Memberikan warna latar untuk header tabel */
            font-weight: bold;
            /* Mempertegas teks header */
        }

        @media print {
            .cetak-rapor tr {
                page-break-inside: avoid;
                /* Hindari potongan di tengah baris */
            }

            .page-break {
                page-break-before: always;
                /* Paksa halaman baru */
            }
        }

        .no-border {
            border: 0 !important;
            border-collapse: collapse !important;
        }

        .cetak-rapor .no-border,
        .cetak-rapor .no-border th,
        .cetak-rapor .no-border td {
            border: none !important;
            /* Hapus border secara eksplisit */
        }

        .text-center {
            text-align: center;
        }

        .note {
            font-size: 11px;
            margin-top: 10px;
        }

        .wrapper-siswa {
            height: calc(110vh - 486px);
            overflow: auto;
        }

        .pilih-siswa.bg-info h5 {
            color: white !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-warning-subtle">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            @if ($personil?->photo)
                                                <img src="{{ URL::asset('images/personil/' . $personil->photo) }}"
                                                    alt="User Avatar" class="rounded-circle avatar-md user-profile-image">
                                            @else
                                                <img src="{{ URL::asset('/images/user-dummy-img.jpg') }}" alt=""
                                                    class="rounded-circle avatar-md user-profile-image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold">{{ $personil->gelardepan }} {{ $personil->namalengkap }}
                                                {{ $personil->gelarbelakang }}</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><i class="ri-building-line align-bottom me-1"></i> Rombel :</div>
                                                <div class="vr"></div>
                                                <div><span class="fw-medium">{{ $waliKelas->rombel }}</span>
                                                </div>
                                                <div class="vr"></div>
                                                <div><span class="fw-medium">{{ $waliKelas->kode_rombel }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="hstack gap-1 flex-wrap mt-3">
                                    Tahun Ajaran : {{ $activeTahunAjaran->tahunajaran ?? 'Tidak Ada' }}<br>
                                    Semester : {{ $activeSemester->semester ?? 'Tidak Ada' }}
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#rapor-siswa"
                                    role="tab">
                                    Rapor Siswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#guru-pengajar" role="tab">
                                    Guru Pengajar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#ranking-siswa" role="tab">
                                    Ranking
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#kenaikan-kelas" role="tab">
                                    Kenaikan Kelas
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="rapor-siswa" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-info mb-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#cover" role="tab">
                                                Cover
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#identsekolah" role="tab">
                                                Identitas
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#nilairapor" role="tab">
                                                Nilai Rapor
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#lampiran1" role="tab">
                                                Lampiran
                                            </a>
                                        </li>
                                    </ul>
                                    <div data-simplebar style="height: 325px;" class="px-3 mx-n3 mb-2">
                                        <div class="table-responsive p-4" id="siswa-detail">
                                            <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show"
                                                role="alert">
                                                <i class="ri-user-smile-line label-icon"></i><strong>Mohon di
                                                    perhatikan !!</strong>
                                                -
                                                Silakan pilih peserta didik dulu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- ene col -->
                        <div class="col-xl-3 col-lg-4">
                            <div class="card">
                                <div class="card-header align-items-center d-flex border-bottom-dashed">
                                    <h4 class="card-title mb-0 flex-grow-1">Pilih Nama Siswa</h4>
                                    {{-- <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#inviteMembersModal"><i
                                                class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                    </div> --}}
                                </div>

                                <div class="card-body">
                                    <div id="wrapperSiswa" data-simplebar style="height: 325px;"
                                        class="mx-n3 px-3 wrapper-siswa invisible">
                                        <div class="vstack gap-3 to-do-menu list-unstyled">
                                            @foreach ($siswaData as $index => $siswa)
                                                <div class="row align-items-center g-3">
                                                    <div class="col-auto">
                                                        <div
                                                            class="avatar-sm p-1 py-2 h-auto bg-info-subtle rounded-3 pilih-siswa">
                                                            <div class="text-center">
                                                                <h5 class="mb-0">{{ $index + 1 }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="text-muted mt-0 mb-1 fs-13">
                                                            {{ $siswa->nis }}
                                                        </h5>
                                                        <a href="{{ route('walikelas.raporsiswa', $siswa->nis) }}"
                                                            class="text-reset fs-14 mb-0 link-detail-siswa"
                                                            data-nis="{{ $siswa->nis }}">
                                                            {{ $siswa->nama_lengkap }}
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- end list -->
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end tab pane -->
                <div class="tab-pane fade" id="guru-pengajar" role="tabpanel">
                    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                        <div class="card-body p-1">
                            <div class="table-responsive">
                                @include('pages.walikelas.rapor-peserta-didik-pengajar')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end tab pane -->
                <div class="tab-pane fade" id="ranking-siswa" role="tabpanel">
                    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                        <div class="card-body p-1">
                            <div class="col-lg-12">
                                <div class="gap-2 hstack justify-content-end mb-4">
                                    <a href="{{ route('walikelas.downloadrankingsiswa') }}"
                                        class="btn btn-soft-primary btn-sm">Download
                                        Ranking</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                @include('pages.walikelas.rapor-peserta-didik-ranking')
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end tab pane -->
                <div class="tab-pane fade" id="kenaikan-kelas" role="tabpanel">
                    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                        <div class="card-body p-1">
                            <div class="col-lg-12">
                                <div class="gap-2 hstack justify-content-end mb-4">
                                    <div>
                                        @if (!$kenaikanExists)
                                            <form action="{{ route('walikelas.rapor-peserta-didik.generatekenaikan') }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-soft-primary">Generate
                                                    Kenaikan</button>
                                            </form>
                                        @else
                                            <div></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                @include('pages.walikelas.rapor-peserta-didik-kenaikan')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end tab pane -->
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('wrapperSiswa').classList.remove('invisible');
        });
    </script>
    <!-- Tambahkan ini di layout atau di bagian akhir Blade -->
    <script>
        function showToast(status = 'success', message) {
            iziToast[status]({
                title: status === 'success' ? 'Success' : (status === 'warning' ? 'Warning' : 'Error'),
                message: message,
                position: 'topRight',
                close: true,
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Tampilkan toast
            @if (session('success'))
                showToast('success', "{{ session('success') }}");
            @endif

            @if (session('error'))
                showToast('error', "{{ session('error') }}");
            @endif

            // Aktifkan tab "kenaikan-kelas" jika diset di session
            @if (session('open_tab') === 'kenaikan-kelas')
                var defaultTab = new bootstrap.Tab(document.querySelector('.nav-link[href="#kenaikan-kelas"]'));
                defaultTab.show();
            @endif
        });
    </script>


    <script>
        $(document).on('click', '.link-detail-siswa', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');

            // Ubah background elemen yang dipilih
            $('.pilih-siswa').removeClass('bg-info').addClass('bg-info-subtle'); // Reset semua
            $(this).closest('.row').find('.pilih-siswa').removeClass('bg-info-subtle').addClass(
                'bg-info'); // Highlight yang dipilih

            // Spinner saat loading
            $('#siswa-detail').html(`
                <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

            // AJAX fetch
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('#siswa-detail').html(response);
                    var defaultTab = new bootstrap.Tab(document.querySelector(
                        '.nav-link[href="#cover"]'));
                    defaultTab.show();
                },
                error: function(xhr) {
                    $('#siswa-detail').html(`
                    <div class="alert alert-danger">
                        Terjadi kesalahan saat mengambil data siswa.
                    </div>
                `);
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
