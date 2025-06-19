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
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="row g-0">
                    <div class="col-lg-9">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                                    <div class="hstack gap-2">
                                        <div class="flex-shrink-0 me-2">
                                            @if ($waliKelas->photo)
                                                <img src="{{ URL::asset('images/thumbnail/' . $waliKelas->photo) }}"
                                                    alt="User Avatar" class="rounded-circle avatar-xs user-profile-image">
                                            @else
                                                <img src="{{ URL::asset('/images/user-dummy-img.jpg') }}" alt=""
                                                    class="rounded-circle avatar-xs user-profile-image">
                                            @endif
                                            {{-- <img src="{{ URL::asset('/images/user-dummy-img.jpg') }}" alt=""
                                                class="rounded-circle avatar-xs user-profile-image"> --}}
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-1 text-truncate">
                                                <span class="candidate-name">
                                                    {{ $waliKelas->gelardepan }} {{ $waliKelas->namalengkap }},
                                                    {{ $waliKelas->gelarbelakang }}</span>
                                            </h5>
                                            <div class="candidate-position text-muted fw-normal">{{ $waliKelas->rombel }}
                                                [{{ $waliKelas->kode_rombel }}]</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-auto order-2 order-sm-3 ms-auto">
                                    <div class="hstack gap-2">
                                        <div class="flex-shrink-0 me-2">
                                            <h5 class="fs-13 mb-1 text-truncate">
                                                <span class="candidate-name">{{ $siswaData->nama_lengkap }}</span>
                                            </h5>
                                            <div class="candidate-position text-muted fw-normal">
                                                NIS. {{ $siswaData->nis }}
                                            </div>

                                        </div>
                                        <div class="flex-grow-1">
                                            @if ($siswaData->foto == 'siswacowok.png')
                                                <img src="{{ URL::asset('images/siswacowok.png') }}" alt="User Avatar"
                                                    class="rounded-circle avatar-xs user-profile-image">
                                            @elseif ($siswaData->foto == 'siswacewek.png')
                                                <img src="{{ URL::asset('images/siswacewek.png') }}" alt="User Avatar"
                                                    class="rounded-circle avatar-xs user-profile-image">
                                            @else
                                                <img src="{{ URL::asset('images/thumbnail/' . $siswaData->foto) }}"
                                                    alt="User Avatar" class="rounded-circle avatar-xs user-profile-image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="nilai" role="tabpanel">
                                <div class="row align-items-end mt-3">
                                    <div class="col">
                                        <div id="mail-filter-navlist">
                                            <ul class="nav nav-tabs nav-tabs-custom nav-info gap-1 text-center border-bottom-0"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#cover"
                                                        role="tab">
                                                        Cover
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#identsekolah"
                                                        role="tab">
                                                        Identitas
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#nilairapor"
                                                        role="tab">
                                                        Nilai Rapor
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#lampiran"
                                                        role="tab">
                                                        Lampiran
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-muted mb-2">
                                            @if ($personal_id == 'Pgw_0016')
                                                <button type="button" class="btn btn-soft-info btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#tambahPilihCetakRapor"><i
                                                        class="ri-file-download-line align-bottom me-1"></i>
                                                    Tambah</button>
                                            @endif
                                            <button class="btn btn-soft-info btn-sm"
                                                onclick="printContent('printable-area-cover')">
                                                Cover</button>
                                            <button class="btn btn-soft-info btn-sm"
                                                onclick="printContent('printable-area-identitas')">
                                                Identitas</button>
                                            <button class="btn btn-soft-info btn-sm"
                                                onclick="printContent('printable-area-nilai')">
                                                Nilai</button>
                                            <button class="btn btn-soft-info btn-sm"
                                                onclick="printContent('printable-area-lampiran')">
                                                Lampiran</button>
                                            <button type="button" id="btn-tampil-rapor"
                                                class="btn btn-soft-secondary btn-sm">
                                                Tampilkan Rapor
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 356px);">
                                    <div id="siswa-detail">
                                        <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                                            role="alert">
                                            <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan
                                                !!</strong> -
                                            Silakan pilih peserta didik dulu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 border-start">
                        <div class="card-header">
                            Pilih Data Catak
                        </div>
                        <div class="card-body">
                            @include('pages.kurikulum.dokumensiswa.cetak-rapor-form-v2')
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
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
        Array.from(document.querySelectorAll("#candidate-list li")).forEach(function(item) {
            item.querySelector("a").addEventListener("click", function() {
                var candidateName = item.querySelector(".candidate-name").innerHTML;
                var candidatePosition = item.querySelector(".candidate-position").innerHTML;
                var candidateImg = item.querySelector(".candidate-img").src

                document.getElementById("candidate-name").innerHTML = candidateName;
                document.getElementById("candidate-position").innerHTML = candidatePosition;
                document.getElementById("candidate-img").src = candidateImg;
            })
        });


        window.addEventListener("load", () => {
            var searchInput = document.getElementById("searchList"), // search box
                candidateList = document.querySelectorAll("#candidate-list li"); // all list items

            searchInput.onkeyup = () => {
                let search = searchInput.value.toLowerCase();

                for (let i of candidateList) {
                    let item = i.querySelector(".candidate-name").innerHTML.toLowerCase();
                    if (item.indexOf(search) == -1) {
                        i.classList.add("d-none");
                    } else {
                        i.classList.remove("d-none");
                    }
                }
            };
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

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
