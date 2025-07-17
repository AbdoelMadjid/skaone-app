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
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="row g-0">
                    <div class="col-lg-9">
                        <div class="card-header">
                            <div class="row" id="info-wali-siswa">
                                @include('pages.kurikulum.dokumensiswa.cetak-rapor-info')
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-pane active" id="nilai" role="tabpanel">
                                <div class="row align-items-end mt-2">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 332px);">
                                    <div id="siswa-detail">
                                        <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                                            role="alert">
                                            <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan
                                                !!</strong> -
                                            Silakan klik tombol konfirmasi untuk menampilkan data.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 border-start">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">Pilih Data Cetak </h5>
                            <div>
                                @if ($personal_id == 'Pgw_0016')
                                    <button type="button" class="btn btn-soft-primary btn-sm w-100" data-bs-toggle="modal"
                                        data-bs-target="#tambahPilihCetakRapor"><i
                                            class="ri-file-download-line align-bottom me-1"></i>
                                        Tambah Penguna</button>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            @include('pages.kurikulum.dokumensiswa.cetak-rapor-form')

                            <!-- Rounded Ribbon -->
                            <div id="data-ceklist">
                                @include('pages.kurikulum.dokumensiswa.cetak-rapor-ceklist')
                            </div>
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

            // Buat tab baru
            var newWin = window.open('', '_blank');

            // Isi dengan konten HTML dan langsung panggil print()
            newWin.document.write(`
                <html>
                    <head>
                        <title>Print Preview</title>
                        <style>
                            body {
                                font-family: "Times New Roman", serif;
                                font-size: 12px;
                            }

                            /* Default: tidak semua tabel punya border */
                            table {
                                width: 100%;
                                border-collapse: collapse;
                            }

                            /* Hanya tabel cetak-rapor yang punya border */
                            table.cetak-rapor th,
                            table.cetak-rapor td {
                                border: 1px solid black;
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
                        </style>
                    </head>
                    <body onload="window.print(); window.close();">
                        ${content}
                    </body>
                </html>
            `);

            newWin.document.close();
        }
    </script>
    <script>
        $('.checklist-checkbox').on('change', function() {
            let kodeRombel = $(this).val();
            let isChecked = $(this).is(':checked');

            $.ajax({
                url: '{{ route('kurikulum.dokumentsiswa.ceklistcetakrapor') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    kode_rombel: kodeRombel,
                    status: isChecked ? 'Sudah' : 'Belum'
                },
                success: function(response) {
                    //console.log(response.message);
                    showToast('success', response.message);
                },
                error: function(xhr) {
                    alert('Gagal menyimpan ceklist.');
                }
            });
        });
    </script>
    <script>
        // Polling setiap 5 detik
        setInterval(() => {
            $.ajax({
                url: '{{ route('kurikulum.dokumentsiswa.ceklistcetakraporterupdate') }}',
                method: 'GET',
                success: function(checkedList) {
                    $('.checklist-checkbox').each(function() {
                        let kode = $(this).val();
                        $(this).prop('checked', checkedList.includes(kode));
                    });
                },
                error: function() {
                    console.warn('Gagal memuat status ceklist terbaru.');
                }
            });
        }, 5000); // 5 detik
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
