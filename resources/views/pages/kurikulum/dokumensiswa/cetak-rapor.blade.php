@extends('layouts.master')
@section('title')
    @lang('translation.cetak-rapor')
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
    </style>
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block" id="foto-siswa-container">
                        <img id="foto-siswa" src="/images/user-dummy-img.jpg" alt=""
                            class="avatar-lg rounded-circle img-thumbnail">
                        <span class="contact-active position-absolute rounded-circle bg-success">
                            <span class="visually-hidden"></span>
                        </span>
                    </div>
                    <h5 class="mt-4 mb-1" id='nama-siswa'> </h5>
                    <p class="text-muted" id='nis-siswa'> </p>
                </div>
                <div class="mb-3 mt-4">
                    Pilih Peserta Didik {{ $waliKelas->rombel }}
                </div>

                <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 568px);">
                    <div class="vstack gap-3 to-do-menu list-unstyled">
                        @foreach ($siswaData as $index => $siswa)
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <div class="avatar-sm p-1 py-2 h-auto bg-info-subtle rounded-3 pilih-siswa">
                                        <div class="text-center">
                                            <h5 class="mb-0">{{ $index + 1 }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="text-muted mt-0 mb-1 fs-13">{{ $siswa->nis }}
                                    </h5>
                                    <a href="#" class="text-reset fs-14 mb-0 detail-link"
                                        data-nis="{{ $siswa->nis }}">
                                        {{ $siswa->nama_lengkap }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--end side content-->
        <div class="file-manager-content w-100 p-4 pb-0">
            <div class="row mb-4">
                <div class="col-auto order-1 d-block d-lg-none">
                    <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                        <i class="ri-menu-2-fill align-bottom"></i>
                    </button>
                </div>
                <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                    <span class="fw-semibold mb-0">Rombel : {{ $waliKelas->rombel }} [{{ $waliKelas->kode_rombel }}]<br>
                        Wali Kelas : {{ $waliKelas->gelardepan }} {{ $waliKelas->namalengkap }},
                        {{ $waliKelas->gelarbelakang }}</span>
                </div>

                <div class="col-auto order-2 order-sm-3 ms-auto">
                    <div class="hstack gap-2">
                        <ul class="nav nav-pills card-header-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#nilai" role="tab">
                                    Rapor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#pengajar" role="tab">
                                    Pilih Data
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="nilai" role="tabpanel">
                    <div class="row align-items-end mt-3">
                        <div class="col">
                            <div id="mail-filter-navlist">
                                <ul class="nav nav-tabs nav-tabs-custom nav-success gap-1 text-center border-bottom-0"
                                    role="tablist">
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
                                        <a class="nav-link" data-bs-toggle="tab" href="#lampiran" role="tab">
                                            Lampiran
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="text-muted mb-2">
                                @if ($personal_id == 'Pgw_0016')
                                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#tambahPilihCetakRapor"><i
                                            class="ri-file-download-line align-bottom me-1"></i>
                                        Tambah</button>
                                @endif
                                <button class="btn btn-soft-info btn-sm" onclick="printContent('printable-area-cover')">
                                    Cover</button>
                                <button class="btn btn-soft-info btn-sm" onclick="printContent('printable-area-identitas')">
                                    Identitas</button>
                                <button class="btn btn-soft-info btn-sm" onclick="printContent('printable-area-nilai')">
                                    Nilai</button>
                                <button class="btn btn-soft-info btn-sm" onclick="printContent('printable-area-lampiran')">
                                    Lampiran</button>

                            </div>
                        </div>
                    </div>
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 356px);">
                        <div id="siswa-detail">
                            <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                                role="alert">
                                <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan !!</strong> -
                                Silakan pilih peserta didik dulu
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pengajar" role="tabpanel">
                    @include('pages.kurikulum.dokumensiswa.cetak-rapor-form')
                </div>
            </div>
        </div>
    </div>
    @include('pages.kurikulum.dokumensiswa.cetak-rapor-tambah-form')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/todo.init.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        var isShowMenu = false;
        var emailMenuSidebar = document.getElementsByClassName('file-manager-sidebar');
        Array.from(document.querySelectorAll(".file-menu-btn")).forEach(function(item) {
            item.addEventListener("click", function() {
                Array.from(emailMenuSidebar).forEach(function(elm) {
                    elm.classList.add("menubar-show");
                    isShowMenu = true;
                });
            });
        });

        window.addEventListener('click', function(e) {
            if (document.querySelector(".file-manager-sidebar").classList.contains('menubar-show')) {
                if (!isShowMenu) {
                    document.querySelector(".file-manager-sidebar").classList.remove("menubar-show");
                }
                isShowMenu = false;
            }
        });
    </script>
    <script>
        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif
        function printContent(elId) {
            var content = document.getElementById(elId).innerHTML;
            var originalContent = document.body.innerHTML;

            // Ganti konten halaman dengan elemen yang dipilih
            document.body.innerHTML = content;

            // Cetak halaman
            window.print();

            // Kembalikan konten asli setelah mencetak
            document.body.innerHTML = originalContent;
            //window.location.reload(); // Refresh halaman untuk memuat ulang skrip
        }
    </script>
    <script>
        $(document).on('click', '.detail-link', function(e) {
            e.preventDefault(); // Mencegah reload halaman
            var nis = $(this).data('nis');

            // Ubah background elemen yang dipilih
            $('.pilih-siswa').removeClass('bg-info').addClass('bg-info-subtle'); // Reset semua
            $(this).closest('.row').find('.pilih-siswa').removeClass('bg-info-subtle').addClass(
                'bg-info'); // Highlight yang dipilih

            // AJAX request
            $.ajax({
                url: "/kurikulum/dokumentsiswa/cetak-rapor/detail-peserta-didik/" + nis,
                method: "GET",
                success: function(response) {
                    // Perbarui nama dan NIS di halaman
                    $('#nama-siswa').text(response.nama_lengkap);
                    $('#nis-siswa').text(response.nis);

                    // Periksa apakah file foto ada
                    if (response.foto) {
                        $.ajax({
                            url: '/images/peserta_didik/' + response.foto,
                            method: 'HEAD', // Memeriksa keberadaan file tanpa memuatnya
                            success: function() {
                                $('#foto-siswa').attr('src', '/images/peserta_didik/' +
                                    response.foto);
                            },
                            error: function() {
                                $('#foto-siswa').attr('src',
                                    '/images/user-dummy-img.jpg'
                                ); // Default jika file tidak ada
                            }
                        });
                    } else {
                        $('#foto-siswa').attr('src',
                            '/images/user-dummy-img.jpg'); // Default jika foto tidak ada di database
                    }
                },
                error: function(xhr) {
                    $('#nama-siswa').text("Siswa tidak ditemukan.");
                    $('#nis-siswa').text("");
                    $('#foto-siswa').attr('src', '/images/user-dummy-img.jpg'); // Kembali ke default
                }
            });


            // AJAX request
            $.ajax({
                url: "/kurikulum/dokumentsiswa/cetak-rapor/" + nis,
                method: "GET",
                success: function(response) {
                    $('#siswa-detail').html(response); // Render detail siswa
                    // Kembali ke tab default (Cover)
                    var defaultTab = new bootstrap.Tab(document.querySelector(
                        '.nav-link[href="#cover"]'));
                    defaultTab.show();
                },
                error: function(xhr) {
                    $('#siswa-detail').html(
                        '<p>Data siswa tidak ditemukan.</p>'); // Tampilkan pesan error
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
