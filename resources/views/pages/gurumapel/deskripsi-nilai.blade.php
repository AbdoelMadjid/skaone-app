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
    <div class="card ribbon-box border shadow-none d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="table-responsive">
            <table class="display table table-bordered dt-responsive" style="width:100%" id="data-nilai-siswa">
                <!-- Header dan Body akan diisi oleh AJAX -->
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script>
        // Kalau kamu ganti pilihan di dropdown #datadeskripsi...
        $(document).on('change', '#datadeskripsi', function(e) {
            e.preventDefault(); // Jangan langsung reload halaman, kita yang atur alurnya

            // Ambil pilihan yang kamu pilih dari dropdown
            let selectedOption = $(this).find(':selected'); // Nyari option yang lagi kepilih
            let kelMapel = selectedOption.data('kel-mapel'); // Kelompok mapelnya apa nih?
            let kodeRombel = selectedOption.data('kode-rombel'); // Kelas atau rombelnya berapa?
            let idPersonil = selectedOption.val(); // ID gurunya siapa?

            // Sekarang kita minta data nilainya dari server
            loadNilai(kodeRombel, kelMapel, idPersonil);
        });

        // Fungsi ini tugasnya ngambil data nilai dari server dan nempelin ke tabel
        function loadNilai(kodeRombel, kelMapel, idPersonil) {
            $.ajax({
                url: '/gurumapel/penilaian/getnilaiformatif', // Link buat minta data
                type: 'GET', // Metode ambil data
                data: {
                    kode_rombel: kodeRombel,
                    kel_mapel: kelMapel,
                    id_personil: idPersonil,
                },
                success: function(response) {
                    // Kalau servernya jawab "error", ya kita kasih tau usernya
                    if (response.error) {
                        alert(response.error);
                        return;
                    }

                    // Ambil data yang dikirim server
                    const data = response.data; // Data utama nilai siswa
                    const jumlahTP = response.jumlahTP; // Berapa TP (Tujuan Pembelajaran) yang ada
                    const jmlSiswa = response.JmlSiswa; // Berapa banyak siswanya

                    // Kalau ada data, kita isi info kelas & guru
                    if (data.length > 0) {
                        $('#rombel-info').text(data[0].rombel || 'Tidak Ada');
                        $('#mapel-info').text(data[0].mata_pelajaran || 'Tidak Ada');
                        $('#gelardepan-info').text(data[0].gelardepan || '');
                        $('#namaguru-info').text(data[0].namalengkap || '');
                        $('#gelarbelakang-info').text(data[0].gelarbelakang || '');
                        $('#jmlsiswa-info').text(jmlSiswa);
                    }

                    // Bikin header tabelnya
                    let tableHeader = `
                    <tr>
                        <th>No.</th>
                        <th>ID Base</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>`;

                    // Tambahin kolom untuk TP sesuai jumlah TP
                    for (let i = 1; i <= jumlahTP; i++) {
                        tableHeader += `<th id="tp-nilai-${i}">TP ${i}</th>`;
                    }

                    // Kolom tambahan buat nilai ringkasan
                    tableHeader += `
                        <th>RF</th> <!-- Rerata Formatif -->
                        <th id="sts">STS</th> <!-- Sumatif Tengah Semester -->
                        <th id="sas">SAS</th> <!-- Sumatif Akhir Semester -->
                        <th id="rs">RS</th> <!-- Rerata Sumatif -->
                        <th id="na">NA</th> <!-- Nilai Akhir -->
                        <th style="display: none;">Semua Nilai</th>
                        <th>Deskripsi Pencapaian Siswa</th>
                    </tr>`;

                    // Bersihin tabel sebelum diisi
                    $('#data-nilai-siswa').html('');
                    $('#data-nilai-siswa').append('<thead>' + tableHeader + '</thead><tbody>');

                    let tableBody = '';
                    let totals = {
                        tp: Array(jumlahTP).fill(0), // Buat nyimpen total tiap TP
                        rf: 0,
                        sts: 0,
                        sas: 0,
                        rs: 0,
                        na: 0
                    };

                    // Loop untuk tiap siswa
                    data.forEach((row, index) => {
                        let totalTP = 0; // Total nilai TP anak ini
                        let countTP = 0; // Berapa TP yang nilainya ada
                        let nilaiAtasRerata = []; // Nilai yang di atas rata-rata
                        let nilaiBawahRerata = []; // Nilai yang di bawah rata-rata

                        // Awal baris siswa
                        tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${row.id}</td>
                        <td>${row.nis}</td>
                        <td>${row.nama_lengkap}</td>`;

                        // Masukin nilai tiap TP
                        for (let i = 1; i <= jumlahTP; i++) {
                            const tpNilai = row['tp_nilai_' + i] ? parseFloat(row['tp_nilai_' + i]) :
                                null;
                            tableBody += `<td>${tpNilai || '-'}</td>`;

                            // Buat hitung rata-rata
                            if (tpNilai !== null) {
                                totalTP += tpNilai;
                                countTP++;
                                totals.tp[i - 1] += tpNilai;
                            }
                        }

                        // Hitung rata-rata TP anak ini
                        const averageTP = countTP > 0 ? totalTP / countTP : 0;

                        // Cari nilai yang lebih tinggi atau rendah dari rata-rata
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

                        // Ambil nilai ringkasan
                        const rf = row.rerata_formatif ? parseFloat(row.rerata_formatif) : null;
                        const sts = row.sts ? parseFloat(row.sts) : null;
                        const sas = row.sas ? parseFloat(row.sas) : null;
                        const rs = row.rerata_sumatif ? parseFloat(row.rerata_sumatif) : null;
                        const na = row.nilai_na ? parseFloat(row.nilai_na) : null;

                        // Cari nilai tertinggi dan terendahnya
                        const highest = nilaiAtasRerata.length > 0 ? Math.max(...nilaiAtasRerata.map(
                            n => n.value)) : null;
                        const highestTP = nilaiAtasRerata.filter(n => n.value === highest).map(n =>
                            `TP ${n.tp}`).join(', ');
                        const lowest = nilaiBawahRerata.length > 0 ? Math.min(...nilaiBawahRerata.map(
                            n => n.value)) : null;
                        const lowestTP = nilaiBawahRerata.filter(n => n.value === lowest).map(n =>
                            `TP ${n.tp}`).join(', ');

                        // Masukin ke tabel
                        tableBody += `
                        <td>${rf || '-'}</td>
                        <td>${sts || '-'}</td>
                        <td>${sas || '-'}</td>
                        <td>${rs ? Math.round(rs) : '-'}</td>
                        <td>${na ? Math.round(na) : '-'}</td>
                        <td style="display: none;">
                            Semua Nilai Tinggi: ${nilaiAtasRerata.map(n => `${n.value} (TP ${n.tp})`).join(', ') || '-'}
                            <br>Semua Nilai Rendah: ${nilaiBawahRerata.map(n => `${n.value} (TP ${n.tp})`).join(', ') || '-'}
                        </td>
                        <td>
                            ${highestTP.split(', ').map(tp => {
                                const tpNumber = tp.match(/\d+/);
                                return tpNumber ? `Bagus banget di ${row['tp_isi_' + tpNumber[0]] || '(nggak ada deskripsi)'}` : '';
                            }).join('<br>')}<br>
                            ${lowestTP.split(', ').map(tp => {
                                const tpNumber = tp.match(/\d+/);
                                return tpNumber ? `Masih perlu belajar di ${row['tp_isi_' + tpNumber[0]] || '(nggak ada deskripsi)'}` : '';
                            }).join('<br>')}
                        </td>
                    </tr>`;

                        // Tambah total buat rata-rata kelas
                        if (rf) totals.rf += rf;
                        if (sts) totals.sts += sts;
                        if (sas) totals.sas += sas;
                        if (rs) totals.rs += rs;
                        if (na) totals.na += na;
                    });

                    // Hitung rata-rata kelas
                    const totalSiswa = data.length;
                    const averages = {
                        tp: totals.tp.map((tp) => (totalSiswa ? tp / totalSiswa : 0)),
                        rf: totalSiswa ? totals.rf / totalSiswa : 0,
                        sts: totalSiswa ? totals.sts / totalSiswa : 0,
                        sas: totalSiswa ? totals.sas / totalSiswa : 0,
                        rs: totalSiswa ? totals.rs / totalSiswa : 0,
                        na: totalSiswa ? totals.na / totalSiswa : 0,
                    };

                    // Baris terakhir buat rata-rata kelas
                    let averageRow = `
                    <tr>
                        <td colspan="3"><strong>Rata-rata Kelas</strong></td>`;
                    for (let i = 0; i < jumlahTP; i++) {
                        averageRow += `<td>${averages.tp[i].toFixed(2) || '-'}</td>`;
                    }
                    averageRow += `
                    <td>${averages.rf.toFixed(2) || '-'}</td>
                    <td>${averages.sts.toFixed(2) || '-'}</td>
                    <td>${averages.sas.toFixed(2) || '-'}</td>
                    <td>${averages.rs.toFixed(2) || '-'}</td>
                    <td>${averages.na.toFixed(2) || '-'}</td>
                    <td colspan="2"></td>
                </tr>`;

                    // Tempelin semua ke tabel
                    $('#data-nilai-siswa').append(tableBody + averageRow + '</tbody>');
                },
                error: function(xhr, status, error) {
                    alert('Ups, ada masalah waktu ambil data: ' + error);
                },
            });
        }
    </script>

    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    {{--     <script src="{{ URL::asset('build/js/pages/todo.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
