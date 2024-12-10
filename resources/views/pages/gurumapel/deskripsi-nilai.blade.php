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
                                                        {{ $kbm->mata_pelajaran }} <br>
                                                        <i class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i>
                                                        {{ $kbm->rombel }}
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
            <div class="card ribbon-box border shadow-none mb-lg-2">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Data KBM</div>
                    <div class="ribbon-content mt-5 text-muted">
                        <div class="row">
                            <div class="col col-md-7">
                                <div class="row align-items-center">
                                    <div class="col-md-4">Guru Mapel</div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-7 text-info">
                                        <span id="gelardepan-info"></span>
                                        <span id="namaguru-info"></span>,
                                        <span id="gelarbelakang-info"></span>
                                    </div>
                                    <div class="col-md-4">Rombongan Belajar</div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-7 text-info"><span id="rombel-info"></span></div>
                                    <div class="col-md-4 align-self-start">Mata Pelajaran</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-7 text-info"><span id="mapel-info"></span></div>
                                    <div class="col-md-4 align-self-start">Jumlah Siswa</div>
                                    <div class="col-md-1 align-self-start">:</div>
                                    <div class="col-md-7 text-info"><span id="jmlsiswa-info"></span></div>
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
                    const jmlSiswa = response.JmlSiswa;

                    // Mengisi informasi rombel dan mata pelajaran dari data yang diterima
                    if (data.length > 0) {
                        $('#rombel-info').text(data[0].rombel || 'Tidak Ada');
                        $('#mapel-info').text(data[0].mata_pelajaran || 'Tidak Ada');
                        $('#gelardepan-info').text(data[0].gelardepan || '');
                        $('#namaguru-info').text(data[0].namalengkap || '');
                        $('#gelarbelakang-info').text(data[0].gelarbelakang || '');
                        $('#jmlsiswa-info').text(jmlSiswa);
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
                    let totals = {
                        tp: Array(jumlahTP).fill(0),
                        rf: 0,
                        sts: 0,
                        sas: 0,
                        rs: 0,
                        na: 0,
                    };

                    data.forEach((row, index) => {
                        tableBody += `
                    <tr>
                        <td class="bg-primary-subtle text-center">${index + 1}</td>
                        <td>${row.nis}</td>
                        <td>${row.nama_lengkap}</td>`;

                        // Tambahkan kolom dinamis untuk TP Isi dan TP Nilai
                        for (let i = 1; i <= jumlahTP; i++) {
                            const tpNilai = row['tp_nilai_' + i] ? parseFloat(row['tp_nilai_' + i]) :
                                null;
                            tableBody += `<td class="text-center">${tpNilai || '-'}</td>`;
                            if (tpNilai) {
                                totals.tp[i - 1] += tpNilai;
                            }
                        }

                        const rf = row.rerata_formatif ? parseFloat(row.rerata_formatif) : null;
                        const sts = row.sts ? parseFloat(row.sts) : null;
                        const sas = row.sas ? parseFloat(row.sas) : null;
                        const rs = row.rerata_sumatif ? parseFloat(row.rerata_sumatif) : null;
                        const na = row.nilai_na ? parseFloat(row.nilai_na) : null;

                        tableBody += `
                    <td class="bg-primary-subtle text-center">${rf || '-'}</td>
                    <td class="text-center">${sts || '-'}</td>
                    <td class="text-center">${sas || '-'}</td>
                    <td class="bg-primary-subtle text-center">${rs ? Math.round(rs) : '-'}</td>
                    <td class="bg-info-subtle text-center">${na ? Math.round(na) : '-'}</td>
                </tr>`;

                        // Tambahkan nilai ke total untuk perhitungan rata-rata
                        if (rf) totals.rf += rf;
                        if (sts) totals.sts += sts;
                        if (sas) totals.sas += sas;
                        if (rs) totals.rs += rs;
                        if (na) totals.na += na;
                    });

                    // Hitung rata-rata
                    const totalSiswa = data.length;
                    const averages = {
                        tp: totals.tp.map((tp) => (totalSiswa ? tp / totalSiswa : 0)),
                        rf: totalSiswa ? totals.rf / totalSiswa : 0,
                        sts: totalSiswa ? totals.sts / totalSiswa : 0,
                        sas: totalSiswa ? totals.sas / totalSiswa : 0,
                        rs: totalSiswa ? totals.rs / totalSiswa : 0,
                        na: totalSiswa ? totals.na / totalSiswa : 0,
                    };

                    // Tambahkan baris rata-rata ke tabel
                    let averageRow = `
                        <tr>
                            <td colspan="3" class="text-center bg-primary-subtle"><strong>Rata-rata</strong></td>`;
                    for (let i = 0; i < jumlahTP; i++) {
                        averageRow +=
                            `<td class="text-center bg-info-subtle">${averages.tp[i].toFixed(2) || '-'}</td>`;
                    }
                    averageRow += `
                            <td class="text-center bg-info-subtle">${averages.rf.toFixed(2) || '-'}</td>
                            <td class="text-center bg-info-subtle">${averages.sts.toFixed(2) || '-'}</td>
                            <td class="text-center bg-info-subtle">${averages.sas.toFixed(2) || '-'}</td>
                            <td class="text-center bg-info-subtle">${averages.rs.toFixed(2) || '-'}</td>
                            <td class="text-center bg-info-subtle">${averages.na.toFixed(2) || '-'}</td>
                        </tr>`;

                    // Tambahkan body dan rata-rata ke tabel
                    $('#data-nilai-siswa').append(tableBody + averageRow + '</tbody>');
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
