@extends('layouts.master')
@section('title')
    @lang('translation.hari-efektif')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="row g-3">
                <div class="col-lg">

                </div>
                <div class="col-lg-auto">
                    <form id="filter-form">
                        <div class="d-flex align-items-center gap-2"> <!-- Tambahan baris ini -->
                            <select class="form-select form-select-sm" id="tahun_ajaran" name="tahun_ajaran_id">
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach ($tahunList as $tahun)
                                    <option value="{{ $tahun->id }}"
                                        {{ $tahun->id == $tahunAktif->id ? 'selected' : '' }}>
                                        {{ $tahun->tahunajaran }}
                                    </option>
                                @endforeach
                            </select>
                            <select class="form-select form-select-sm" id="semester" name="semester">
                                <option value="">Pilih Semester</option>
                                <option value="Ganjil" {{ $semesterAktif->semester == 'Ganjil' ? 'selected' : '' }}>
                                    Ganjil
                                </option>
                                <option value="Genap" {{ $semesterAktif->semester == 'Genap' ? 'selected' : '' }}>
                                    Genap
                                </option>
                            </select>
                            <button type="submit" class="btn btn-soft-primary btn-sm">Tampilkan</button>
                        </div> <!-- Penutup div flex -->
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="kalender-wrapper" class="row"></div>
        </div>
    </div>
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-0">
            <div class="card-body">
                <div class="ribbon ribbon-primary round-shape">Perhitungan Hari Efektif Pembelajaran</div>
                <h5 class="fs-14 text-end"></h5>
                <div class="ribbon-content mt-4">

                    <div class="row">
                        <div class="col-sm"></div>
                        <div class="col-md-auto">
                            <label for="kehadiranPersen" class="mb-0">Kehadiran Ideal:</label>
                            <select id="kehadiranPersen" class="form-select form-select-sm w-auto">
                                <option value="80" selected>80%</option>
                                <option value="85">85%</option>
                                <option value="90">90%</option>
                            </select>
                        </div>
                    </div>
                    <div id="rekap-hari" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {
            let globalRekap = {}; // 🌍 Menyimpan data rekap hari efektif secara global untuk digunakan ulang

            // Fungsi untuk mengubah angka bulan menjadi nama bulan dalam bahasa Indonesia
            function bulanName(bulan) {
                return [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ][bulan - 1];
            }

            // Fungsi untuk merender tabel rekap total hari efektif per bulan
            function renderRekapHari(rekap) {
                let persenKehadiran = parseInt($('#kehadiranPersen').val() ||
                    80); // Ambil persentase kehadiran ideal (default 80%)
                let persenAlfa = 100 - persenKehadiran; // Sisanya dianggap toleransi alfa

                // Header tabel rekap
                let html = `
                <h5 class="mt-4">Rekap Total Hari Efektif per Bulan:</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Bulan</th>
                                <th>Hari Efektif</th>
                                <th>Kehadiran Ideal (${persenKehadiran}%)</th>
                                <th>Toleransi Alfa (${persenAlfa}%)</th>
                            </tr>
                        </thead>
                        <tbody>
            `;

                let totalHariEfektif = 0,
                    totalKehadiranIdeal = 0,
                    totalToleransiAlfa = 0;

                // Loop setiap bulan dalam rekap
                Object.entries(rekap).forEach(([bulan, jumlah]) => {
                    let kehadiranIdeal = Math.round(jumlah * persenKehadiran / 100);
                    let toleransiAlfa = jumlah - kehadiranIdeal;

                    totalHariEfektif += jumlah;
                    totalKehadiranIdeal += kehadiranIdeal;
                    totalToleransiAlfa += toleransiAlfa;

                    html += `
                    <tr>
                        <td>${bulanName(parseInt(bulan))}</td>
                        <td>${jumlah}</td>
                        <td>${kehadiranIdeal} hari</td>
                        <td>${toleransiAlfa} hari</td>
                    </tr>
                `;
                });

                // Footer tabel rekap
                html += `
                        </tbody>
                        <tfoot class="table-secondary fw-bold">
                            <tr>
                                <td>Total</td>
                                <td>${totalHariEfektif}</td>
                                <td>${totalKehadiranIdeal} hari</td>
                                <td>${totalToleransiAlfa} hari</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            `;

                $('#rekap-hari').html(html); // Tampilkan di elemen #rekap-hari
            }

            // Fungsi untuk memuat kalender dari server
            function loadKalender() {
                let tahunId = $('#tahun_ajaran').val();
                let semester = $('#semester').val();

                // Request untuk mendapatkan data kalender
                $.post('{{ route('kurikulum.datakbm.hari-efektif-generate') }}', {
                    _token: '{{ csrf_token() }}',
                    tahun_ajaran_id: tahunId,
                    semester: semester
                }, function(res) {
                    let wrapper = $('#kalender-wrapper');
                    wrapper.empty(); // Kosongkan wrapper

                    const kalender = res.kalender;
                    globalRekap = res.rekap; // Simpan data rekap ke variabel global

                    // Render setiap bulan
                    Object.entries(kalender).forEach(([bulan, hariList]) => {
                        let col = $('<div class="col-md-4 mb-4"></div>');
                        let card = $('<div class="card h-100 d-flex flex-column"></div>');

                        // Buat tabel kalender dengan header nama bulan dan nama hari
                        let table = $(`
                        <table class="table table-bordered text-center mb-0">
                            <thead>
                                <tr><th colspan="7">${bulanName(parseInt(bulan))}</th></tr>
                                <tr><th>Sen</th><th>Sel</th><th>Rab</th><th>Kam</th><th>Jum</th><th>Sab</th><th>Min</th></tr>
                            </thead>
                        </table>
                    `);

                        let tbody = $('<tbody></tbody>');
                        let minggu = []; // Penampung satu minggu

                        hariList.forEach((item, index) => {
                            let date = new Date(item.tanggal);
                            let day = date.getDay(); // 0 = Minggu

                            // Isi spasi kosong di awal bulan
                            if (index === 0 && day !== 1) {
                                for (let i = 1; i < (day === 0 ? 7 : day); i++) {
                                    minggu.push('<td></td>');
                                }
                            }

                            // Tentukan warna cell
                            let cls = item.is_libur ? 'bg-danger text-white' :
                                item.is_weekday ? 'bg-success text-white' : '';

                            // Tambahkan tanggal ke array minggu
                            minggu.push(
                                `<td class="tanggal ${cls}" data-tgl="${item.tanggal}">${date.getDate()}</td>`
                            );

                            // Jika sudah 7 hari, masukkan sebagai 1 minggu di tabel
                            if (minggu.length === 7) {
                                tbody.append('<tr>' + minggu.join('') + '</tr>');
                                minggu = [];
                            }
                        });

                        // Isi sisa minggu terakhir jika belum 7 hari
                        if (minggu.length) {
                            while (minggu.length < 7) minggu.push('<td></td>');
                            tbody.append('<tr>' + minggu.join('') + '</tr>');
                        }

                        table.append(tbody);
                        card.append(table);

                        // Tambahkan rekap hari efektif di bawah kalender
                        let totalHari = globalRekap[bulan] || 0;
                        let footer = $(`
                        <div class="px-3 py-2 bg-light border-top mt-auto text-end">
                            <em>Hari Efektif: <strong>${totalHari}</strong> hari</em>
                        </div>
                    `);
                        card.append(footer);

                        col.append(card);
                        wrapper.append(col);
                    });

                    // Tampilkan tabel rekap di bawah kalender
                    renderRekapHari(globalRekap);
                });
            }

            // Fungsi untuk menghitung ulang total hari efektif setelah perubahan
            function hitungHariEfektif() {
                $.post('{{ route('kurikulum.datakbm.hari-efektif-hitung') }}', {
                    _token: '{{ csrf_token() }}',
                    tahun_ajaran_id: $('#tahun_ajaran').val(),
                    semester: $('#semester').val()
                }, function(res) {
                    // Perbarui data global rekap
                    globalRekap = {};
                    res.data.forEach(r => {
                        globalRekap[r.bulan] = r.jumlah_hari_efektif;
                    });

                    // Render ulang tabel rekap
                    renderRekapHari(globalRekap);
                });
            }

            // Event: Submit form filter
            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                loadKalender(); // Muat ulang kalender sesuai filter
            });

            // Event: Klik tanggal untuk toggle libur/efektif
            $('#kalender-wrapper').on('click', '.tanggal', function() {
                if (!$(this).hasClass('bg-success') && !$(this).hasClass('bg-danger')) return;

                let el = $(this);
                let tanggal = el.data('tgl');

                $.post('{{ route('kurikulum.datakbm.hari-efektif-toggle-libur') }}', {
                    _token: '{{ csrf_token() }}',
                    tanggal: tanggal,
                    tahun_ajaran_id: $('#tahun_ajaran').val(),
                    semester: $('#semester').val()
                }, function(res) {
                    // Update warna tanggal sesuai status baru
                    if (res.status === 'added') {
                        el.removeClass('bg-success').addClass('bg-danger text-white');
                    } else {
                        el.removeClass('bg-danger text-white').addClass('bg-success');
                    }
                    hitungHariEfektif(); // Hitung ulang rekap setelah perubahan
                });
            });

            // Event: Perubahan input persentase kehadiran
            $('#kehadiranPersen').on('change', function() {
                renderRekapHari(globalRekap); // Update tabel rekap langsung tanpa reload data
            });

            loadKalender(); // Load awal kalender saat halaman dibuka
        });
    </script>


    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
