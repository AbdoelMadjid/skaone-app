@extends('layouts.master')
@section('title')
    @lang('translation.deskripsi-nilai')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
    <style>
        .hidden {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <div class="mb-3">
                    <div class="text-center">
                        <div class="mx-auto mb-4 profile-user position-relative d-inline-block">
                            @if ($personil->jeniskelamin == 'Perempuan')
                                <img src="{{ $personil->photo ? URL::asset('images/personil/' . $personil->photo) : URL::asset('images/gurucewek.png') }}"
                                    alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @else
                                <img src="{{ $personil->photo ? URL::asset('images/personil/' . $personil->photo) : URL::asset('images/gurulaki.png') }}"
                                    alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @endif
                        </div>
                        <h5 class="mb-1 fs-16">{{ $personil->namalengkap }}</h5>
                    </div>
                </div>

                <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                    <ul class="to-do-menu list-unstyled" id="projectlist-data">
                        <li>
                            <a data-bs-toggle="collapse" href="#velzonAdmin" class="nav-link fs-13 active">Pilih Mata
                                Pelajaran</a>
                            <div class="collapse show" id="velzonAdmin">
                                <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                    @foreach ($KbmPersonil as $kbm)
                                        @php
                                            // Hitung jumlah siswa untuk setiap rombel
                                            $jmlsiswa = DB::table('peserta_didik_rombels')
                                                ->where('tahun_ajaran', $kbm->tahunajaran)
                                                ->where('kode_kk', $kbm->kode_kk)
                                                ->where('rombel_tingkat', $kbm->tingkat)
                                                ->where('rombel_kode', $kbm->kode_rombel)
                                                ->count();
                                        @endphp
                                        <li>
                                            <a href="#" id="datadeskripsi" data-kel-mapel="{{ $kbm->kel_mapel }}"
                                                data-kode-rombel="{{ $kbm->kode_rombel }}"
                                                data-id-personil="{{ $kbm->id_personil }}"
                                                class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">
                                                        {{ $kbm->kel_mapel }} - {{ $kbm->mata_pelajaran }} <br>
                                                        <i class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i>
                                                        {{ $kbm->kode_rombel }} - {{ $kbm->rombel }}
                                                    </h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <span class="badge bg-light text-muted">
                                                        {{ $jmlsiswa }}
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
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
                    <h5 class="fw-semibold mb-0">Deskripsi Nilai <span class="badge bg-primary align-bottom ms-2">Mata
                            Pelajaran</span></h5>
                </div>

                <div class="col-auto order-2 order-sm-3 ms-auto">
                    <div class="hstack gap-2">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-icon fw-semibold btn-soft-danger"><i
                                    class="ri-arrow-go-back-line"></i></button>
                            <button class="btn btn-icon fw-semibold btn-soft-success"><i
                                    class="ri-arrow-go-forward-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="p-3 bg-light rounded mb-4">
                <div class="row g-2">
                    <div class="col-lg-auto">
                        <select class="form-control" data-choices data-choices-search-false name="choices-select-sortlist"
                            id="choices-select-sortlist">
                            <option value="">Sort</option>
                            <option value="By ID">By ID</option>
                            <option value="By Name">By Name</option>
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-control" data-choices data-choices-search-false name="choices-select-status"
                            id="choices-select-status">
                            <option value="">All Tasks</option>
                            <option value="Completed">Completed</option>
                            <option value="Inprogress">Inprogress</option>
                            <option value="Pending">Pending</option>
                            <option value="New">New</option>
                        </select>
                    </div>
                    <div class="col-lg">
                        <div class="search-box">
                            <input type="text" id="searchTaskList" class="form-control search"
                                placeholder="Search task name">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <button class="btn btn-primary createTask" type="button" data-bs-toggle="modal"
                            data-bs-target="#createTask">
                            <i class="ri-add-fill align-bottom"></i> Add Tasks
                        </button>
                    </div>
                </div>
            </div> --}}

            <div class="card ribbon-box border shadow-none mb-lg-2">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Data KBM</div>
                    <div class="ribbon-content mt-5 text-muted">
                        <div class="row">
                            <div class="col col-md-7">
                                <div class="row align-items-center">
                                    <div class="col-md-4">Rombongan Belajar</div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-7 text-info"><span id="rombel-info"></span></div>
                                    <div class="col-md-4 align-self-start">Mata Pelajaran</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-7 text-info"><span id="mapel-info"></span></div>
                                </div>
                            </div>
                            <div class="col col-md-5">
                                <div class="row align-items-center">
                                    <div class="col-md-2">TP</div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-9 text-info">Tujuan Pembelajaran</div>
                                    <div class="col-md-2 align-self-start">RF</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-9 text-info">Rata-Rata Formatif</div>
                                    <div class="col-md-2 align-self-start">STS</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-9 text-info">Sumatif Tengan Semester</div>
                                    <div class="col-md-2 align-self-start">SAS</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-9 text-info">Sumatif Akhir Semester</div>
                                    <div class="col-md-2 align-self-start">RS</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-9 text-info">Rata-Rata Sumatif</div>
                                    <div class="col-md-2 align-self-start">NA</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-9 text-info">Nilai Akhir</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
                <div class="todo-task" id="todo-task">
                    <div class="table-responsive">
                        <table class="table align-middle position-relative table-nowrap" id="data-nilai-siswa">
                            <!-- Header dan Body akan diisi oleh AJAX -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).on('click', '#datadeskripsi', function(e) {
            e.preventDefault();

            // Ambil data dari atribut HTML
            let kelMapel = $(this).data('kel-mapel');
            let kodeRombel = $(this).data('kode-rombel');
            let idPersonil = $(this).data('id-personil');

            // Panggil fungsi untuk memuat data nilai formatif
            loadNilai(kodeRombel, kelMapel, idPersonil);
        });

        function loadNilai(kodeRombel, kelMapel, idPersonil) {
            $.ajax({
                url: '/gurumapel/penilaian/getnilaiformatif', // Endpoint untuk mendapatkan data nilai
                type: 'GET',
                data: {
                    kode_rombel: kodeRombel,
                    kel_mapel: kelMapel,
                    id_personil: idPersonil,
                },
                success: function(response) {
                    if (response.error) {
                        alert(response.error); // Menampilkan pesan error dari server
                        return;
                    }

                    const data = response.data;
                    const jumlahTP = response.jumlahTP;

                    // Mengisi informasi rombel dan mata pelajaran dari data yang diterima
                    if (data.length > 0) {
                        $('#rombel-info').text(data[0].rombel || 'Tidak Ada');
                        $('#mapel-info').text(data[0].mata_pelajaran || 'Tidak Ada');
                    }

                    // Buat header tabel dinamis
                    let tableHeader = `
            <tr>
                <th style="width: 30px;">No.</th>
                <th style="width: 100px;">NIS</th>
                <th style="width: 200px;">Nama Siswa</th>`;

                    // Tambahkan kolom dinamis untuk TP Isi dan TP Nilai sesuai jumlahTP
                    for (let i = 1; i <= jumlahTP; i++) {
                        tableHeader += `
                <th style="width: 50px;" id="tp-nilai-${i}">TP ${i}</th>`;
                    }

                    tableHeader += `<th style="width: 40px;">RF</th>`;
                    tableHeader += `
            <th style="width: 50px;" id="sts">STS</th>
            <th style="width: 50px;" id="sas">SAS</th>
            <th style="width: 50px;" id="rs">RS</th>
            <th style="width: 50px;" id="na">NA</th>
            </tr>
        `;

                    // Bersihkan tabel sebelum memuat data baru
                    $('#data-nilai-siswa').html('');
                    $('#data-nilai-siswa').append('<thead>' + tableHeader + '</thead><tbody>');

                    // Buat body tabel dinamis
                    let tableBody = '';
                    data.forEach((row, index) => {
                        tableBody += `
                <tr>
                    <td class="bg-primary-subtle text-center">${index + 1}</td>
                    <td>${row.nis}</td>
                    <td>${row.nama_lengkap}</td>`;

                        // Tambahkan kolom dinamis untuk TP Isi dan TP Nilai
                        for (let i = 1; i <= jumlahTP; i++) {
                            tableBody += `
                    <td>${row['tp_nilai_' + i] || '-'}</td>`;
                        }

                        tableBody += `
                <td class="bg-primary-subtle text-center">${row.rerata_formatif || '-'}</td>
                <td>${row.sts || '-'}</td>
                <td>${row.sas || '-'}</td>
                <td class="bg-primary-subtle text-center">${row.rerata_sumatif ? Math.round(Number(row.rerata_sumatif)) : '-'}</td>
                <td class="bg-info-subtle text-center">${Math.round(row.nilai_na) || '-'}</td>
            </tr>`;
                    });

                    $('#data-nilai-siswa').append(tableBody + '</tbody>');
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat memuat data nilai: ' +
                        error); // Informasi tambahan dari error
                },
            });
        }
    </script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    {{--     <script src="{{ URL::asset('build/js/pages/todo.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
