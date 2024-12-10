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
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.penilaian')
        @endslot
    @endcomponent
    <div class="card ribbon-box border shadow-none mb-lg-4">
        <div class="card-body">
            <div class="ribbon ribbon-primary round-shape">Data KBM</div>
            <h5 class="fs-14 text-end">

            </h5>

            <div class="ribbon-content mt-5 text-muted">

                <div class="row">
                    <div class="col col-md-7">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3">Pilih Mapel dan Kelas</div>
                            <div class="col-md-1 mb-3">:</div>
                            <div class="col-md-7 text-info">
                                <select id="datadeskripsi" class="form-select form-select-sm mb-3">
                                    <option value="" selected>Pilih Mapel dan Kelas</option>
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
                                        <option value="{{ $kbm->id_personil }}" data-kel-mapel="{{ $kbm->kel_mapel }}"
                                            data-kode-rombel="{{ $kbm->kode_rombel }}">
                                            {{ $kbm->mata_pelajaran }} - {{ $kbm->rombel }} ({{ $jmlsiswa }} siswa)
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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
    <div class="card">
        <!-- end card header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered dt-responsive" style="width:100%" id="data-nilai-siswa">
                    <!-- Header dan Body akan diisi oleh AJAX -->
                </table>
            </div>
        </div>
        <!-- end card body -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).on('change', '#datadeskripsi', function(e) {
            e.preventDefault();

            // Ambil data dari opsi yang dipilih
            let selectedOption = $(this).find(':selected'); // Ambil opsi yang terpilih
            let kelMapel = selectedOption.data('kel-mapel');
            let kodeRombel = selectedOption.data('kode-rombel');
            let idPersonil = selectedOption.val(); // Nilai dari value atribut

            // Panggil fungsi untuk memuat data nilai formatif
            loadNilai(kodeRombel, kelMapel, idPersonil);
        });

        function loadNilai(kodeRombel, kelMapel, idPersonil) {
            $.ajax({
                url: '/gurumapel/penilaian/getnilaiformatif',
                type: 'GET',
                data: {
                    kode_rombel: kodeRombel,
                    kel_mapel: kelMapel,
                    id_personil: idPersonil,
                },
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                        return;
                    }

                    const data = response.data;
                    const jumlahTP = response.jumlahTP;
                    const jmlSiswa = response.JmlSiswa;

                    if (data.length > 0) {
                        $('#rombel-info').text(data[0].rombel || 'Tidak Ada');
                        $('#mapel-info').text(data[0].mata_pelajaran || 'Tidak Ada');
                        $('#gelardepan-info').text(data[0].gelardepan || '');
                        $('#namaguru-info').text(data[0].namalengkap || '');
                        $('#gelarbelakang-info').text(data[0].gelarbelakang || '');
                        $('#jmlsiswa-info').text(jmlSiswa);
                    }

                    let tableHeader = `
            <tr>
                <th style="width: 30px;">No.</th>
                <th style="width: 100px;">NIS</th>
                <th style="width: 200px;">Nama Siswa</th>`;

                    for (let i = 1; i <= jumlahTP; i++) {
                        tableHeader += `<th style="width: 50px;" id="tp-nilai-${i}">TP ${i}</th>`;
                    }

                    tableHeader += `
                <th>RF</th>
                <th id="sts">STS</th>
                <th id="sas">SAS</th>
                <th id="rs">RS</th>
                <th id="na">NA</th>
                <th style="width: 200px;">Semua Nilai</th>
                <th>Nilai Tertinggi / Terendah</th>
            </tr>`;

                    $('#data-nilai-siswa').html('');
                    $('#data-nilai-siswa').append('<thead>' + tableHeader + '</thead><tbody>');

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
                        let totalTP = 0;
                        let countTP = 0;
                        let nilaiAtasRerata = [];
                        let nilaiBawahRerata = [];

                        tableBody += `
                <tr>
                    <td class="bg-primary-subtle text-center">${index + 1}</td>
                    <td>${row.nis}</td>
                    <td>${row.nama_lengkap}</td>`;

                        for (let i = 1; i <= jumlahTP; i++) {
                            const tpNilai = row['tp_nilai_' + i] ? parseFloat(row['tp_nilai_' + i]) :
                                null;
                            tableBody += `<td class="text-center">${tpNilai || '-'}</td>`;

                            if (tpNilai !== null) {
                                totalTP += tpNilai;
                                countTP++;
                                totals.tp[i - 1] += tpNilai;
                            }
                        }

                        const averageTP = countTP > 0 ? totalTP / countTP : 0;

                        for (let i = 1; i <= jumlahTP; i++) {
                            const tpNilai = row['tp_nilai_' + i] ? parseFloat(row['tp_nilai_' + i]) :
                                null;
                            if (tpNilai !== null) {
                                if (tpNilai > averageTP) nilaiAtasRerata.push({
                                    value: tpNilai,
                                    tp: i
                                });
                                if (tpNilai < averageTP) nilaiBawahRerata.push({
                                    value: tpNilai,
                                    tp: i
                                });
                            }
                        }

                        const rf = row.rerata_formatif ? parseFloat(row.rerata_formatif) : null;
                        const sts = row.sts ? parseFloat(row.sts) : null;
                        const sas = row.sas ? parseFloat(row.sas) : null;
                        const rs = row.rerata_sumatif ? parseFloat(row.rerata_sumatif) : null;
                        const na = row.nilai_na ? parseFloat(row.nilai_na) : null;

                        // Filter nilai tertinggi dan terendah
                        const highest = nilaiAtasRerata.length > 0 ? Math.max(...nilaiAtasRerata.map(
                            n => n.value)) : null;
                        const highestTP = nilaiAtasRerata.filter(n => n.value === highest).map(n =>
                            `TP ${n.tp}`).join(', ');

                        const lowest = nilaiBawahRerata.length > 0 ? Math.min(...nilaiBawahRerata.map(
                            n => n.value)) : null;
                        const lowestTP = nilaiBawahRerata.filter(n => n.value === lowest).map(n =>
                            `TP ${n.tp}`).join(', ');

                        tableBody += `
                    <td class="bg-primary-subtle text-center">${rf || '-'}</td>
                    <td class="text-center">${sts || '-'}</td>
                    <td class="text-center">${sas || '-'}</td>
                    <td class="bg-primary-subtle text-center">${rs ? Math.round(rs) : '-'}</td>
                    <td class="bg-info-subtle text-center">${na ? Math.round(na) : '-'}</td>
                    <td>Semua Nilai Tertinggi: <br>
                        ${nilaiAtasRerata.map(n => `${n.value} (TP ${n.tp})`).join(', ') || '-'}<br>
                        Semua Nilai Terendah :<br>
                        ${nilaiBawahRerata.map(n => `${n.value} (TP ${n.tp})`).join(', ') || '-'}
                    </td>
                    <td>
                        Nilai Tertinggi : ${highest !== null ? `${highest} (${highestTP})` : '-'} <br>
                        Nilai Terendah : ${lowest !== null ? `${lowest} (${lowestTP})` : '-'}
                    </td>
                </tr>`;

                        if (rf) totals.rf += rf;
                        if (sts) totals.sts += sts;
                        if (sas) totals.sas += sas;
                        if (rs) totals.rs += rs;
                        if (na) totals.na += na;
                    });

                    const totalSiswa = data.length;
                    const averages = {
                        tp: totals.tp.map((tp) => (totalSiswa ? tp / totalSiswa : 0)),
                        rf: totalSiswa ? totals.rf / totalSiswa : 0,
                        sts: totalSiswa ? totals.sts / totalSiswa : 0,
                        sas: totalSiswa ? totals.sas / totalSiswa : 0,
                        rs: totalSiswa ? totals.rs / totalSiswa : 0,
                        na: totalSiswa ? totals.na / totalSiswa : 0,
                    };

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
                <td class="text-center bg-primary-subtle"></td>
                <td class="text-center bg-primary-subtle"></td>
            </tr>`;

                    $('#data-nilai-siswa').append(tableBody + averageRow + '</tbody>');
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat memuat data nilai: ' + error);
                },
            });
        }
    </script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    {{--     <script src="{{ URL::asset('build/js/pages/todo.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
