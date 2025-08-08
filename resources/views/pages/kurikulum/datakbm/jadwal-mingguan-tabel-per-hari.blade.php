@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-guru')
@endsection
@section('css')
    <style>
        #modalStatistik td {
            font-weight: bold;
            text-align: center;
        }
    </style>
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-3">
                    <x-btn-group-dropdown>
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperrombel') }}" label="Jadwal Per Rombel"
                            icon="ri-calendar-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperguru') }}" label="Jadwal Per Guru"
                            icon="ri-calendar-2-fill" />
                    </x-btn-group-dropdown>
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="row g-3">
                <div class="col-lg">

                </div>
                <div class="col-lg-auto">
                    <input type="date" id="inputTanggalKehadiran" name="tanggal" class="form-control"
                        onchange="cekHariDanTombol()">
                </div>

                <div class="col-lg-auto">
                    <select class="form-control" id="selectHari" name="hari">
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>
                <div class="col-lg-auto">
                    <button class="btn btn-soft-primary d-none" id="btnStatistik">Statistik</button>
                </div>
                {{-- <div class="col-lg-auto">
                    <button id="btnSimpanMassal" class="btn btn-success mb-3" style="display:none;">
                        Simpan Kehadiran Massal
                    </button>
                </div> --}}
            </div>
        </div>
        <div class="card-body p-1">
            <div id="containerTableJadwal">
                <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                    role="alert">
                    <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan
                        !!</strong> -
                    Silakan pilih hari dulu untuk menampilkan data.
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalStatistik" tabindex="-1" aria-labelledby="modalStatistikLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Statistik Kehadiran Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 50%">Tanggal</th>
                                <td id="statTanggal"></td>
                            </tr>
                            <tr>
                                <th>Hari</th>
                                <td id="statHari"></td>
                            </tr>
                            <tr>
                                <th>Total Jam</th>
                                <td id="statTotalJam"></td>
                            </tr>
                            <tr>
                                <th>Jam Hadir</th>
                                <td id="statJamHadir"></td>
                            </tr>
                            <tr>
                                <th>Jam Tidak Hadir</th>
                                <td id="statJamTidakHadir"></td>
                            </tr>
                            <tr>
                                <th>Prosentase Absen</th>
                                <td id="statProsentaseHadir"></td>
                            </tr>
                            <tr>
                                <th>Prosentase Hadir</th>
                                <td id="statProsentaseAbsen"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectHari = document.getElementById('selectHari');
            const inputTanggal = document.getElementById('inputTanggalKehadiran');
            const container = document.getElementById('containerTableJadwal');
            const btnStatistik = document.getElementById('btnStatistik');

            // Sembunyikan tombol saat pertama kali
            btnStatistik.classList.add('d-none');

            function getNamaHari(dateString) {
                const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const d = new Date(dateString);
                return hari[d.getDay()];
            }

            inputTanggal.addEventListener('change', function() {
                const tgl = this.value;
                if (!tgl) {
                    btnStatistik.classList.add('d-none');
                    selectHari.disabled = true; // Aktifkan kembali jika tanggal dihapus
                    return;
                }

                const namaHari = getNamaHari(tgl);

                if (namaHari === 'Sabtu' || namaHari === 'Minggu') {
                    container.innerHTML =
                        `<div class="alert alert-warning">Tidak ada jadwal pada hari ${namaHari}.</div>`;
                    selectHari.value = '';
                    selectHari.disabled = true; // tetap bisa ubah manual kalau Sabtu/Minggu
                    btnStatistik.classList.add('d-none');
                } else {
                    selectHari.value = namaHari;
                    selectHari.disabled = true; // Disable dropdown agar tidak bisa diubah
                    fetchJadwal(namaHari, tgl);
                    btnStatistik.classList.remove('d-none');
                }
            });

            selectHari.addEventListener('change', function() {
                const hari = this.value;
                const tanggal = inputTanggal.value;

                if (!hari || !tanggal) {
                    container.innerHTML =
                        '<div class="alert alert-warning">Silakan pilih hari dan tanggal terlebih dahulu.</div>';
                    btnStatistik.classList.add('d-none');
                    return;
                }

                if (hari === 'Sabtu' || hari === 'Minggu') {
                    container.innerHTML =
                        `<div class="alert alert-warning">Tidak ada jadwal pada hari ${hari}.</div>`;
                    btnStatistik.classList.add('d-none');
                    return;
                }

                fetchJadwal(hari, tanggal);
                btnStatistik.classList.remove('d-none'); // Tampilkan tombol
            });

            function fetchJadwal(hari, tanggal) {
                container.innerHTML = '<div class="text-muted">Memuat jadwal...</div>';

                fetch(
                        `/kurikulum/datakbm/ajax-tampil?hari=${encodeURIComponent(hari)}&tanggal=${encodeURIComponent(tanggal)}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        container.innerHTML = data.html;
                    })
                    .catch(error => {
                        console.error('Gagal memuat:', error);
                        container.innerHTML =
                            '<div class="alert alert-danger">Terjadi kesalahan saat memuat data.</div>';
                    });
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnStatistik = document.getElementById('btnStatistik');
            const modalStatistik = new bootstrap.Modal(document.getElementById('modalStatistik'));

            // Fungsi ubah format tanggal YYYY-MM-DD → 08 Agustus 2025
            function formatTanggalIndonesia(tanggalString) {
                const bulanIndo = [
                    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                ];

                const [tahun, bulan, hari] = tanggalString.split('-');
                return `${String(hari).padStart(2, '0')} ${bulanIndo[parseInt(bulan) - 1]} ${tahun}`;
            }

            btnStatistik.addEventListener('click', function() {
                const tanggal = document.getElementById('inputTanggalKehadiran').value;
                const hari = document.getElementById('selectHari').value;

                // Ambil total jam
                const totalJamEl = document.querySelector('tfoot .jadwal-terisi');
                const totalJam = parseInt(totalJamEl?.textContent.trim()) || 0;

                // Ambil total hadir dari th yang pakai data-hari
                const jamHadirEl = document.querySelector(`tfoot .total-kehadiran[data-hari="${hari}"]`);
                const jamHadir = parseInt(jamHadirEl?.textContent.trim()) || 0;

                // Ambil prosentase
                const prosentaseTidakHadirEl = document.querySelector(
                    `tfoot .total-prosentase[data-hari="${hari}"]`);
                const prosentaseTidakHadir = prosentaseTidakHadirEl?.textContent.trim() || '0%';

                // Hitung tidak hadir
                const jamTidakHadir = totalJam - jamHadir;

                // Tambahkan parsing angka
                const persenAngka = parseFloat(prosentaseTidakHadir.replace('%', '')) || 0;
                const prosentaseHadir = (100 - persenAngka) + '%';

                // Isi data ke modal
                document.getElementById('statTanggal').textContent = tanggal ? formatTanggalIndonesia(
                    tanggal) : '-';
                document.getElementById('statHari').textContent = hari || '-';
                document.getElementById('statTotalJam').textContent = totalJam + " jam";
                document.getElementById('statJamHadir').textContent = jamHadir + " jam";
                document.getElementById('statJamTidakHadir').textContent = jamTidakHadir + " jam";
                document.getElementById('statProsentaseAbsen').textContent = prosentaseTidakHadir;
                document.getElementById('statProsentaseHadir').textContent = prosentaseHadir;

                // Tampilkan modal
                modalStatistik.show();
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('containerTableJadwal');

            container.addEventListener('click', function(e) {
                const target = e.target.closest('.cell-kehadiran');
                if (!target) return;

                const idJadwal = target.dataset.idJadwal;
                const idPersonil = target.dataset.idPersonil;
                const hari = target.dataset.hari;
                const jam = target.dataset.jam;
                const tanggal = document.getElementById('inputTanggalKehadiran').value;

                // Toggle warna dulu (optimis)
                target.classList.toggle('bg-primary');
                target.classList.toggle('text-white');

                fetch("{{ route('kurikulum.datakbm.simpankehadiranguru') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            jadwal_mingguan_id: idJadwal,
                            id_personil: idPersonil,
                            hari: hari,
                            jam_ke: jam,
                            tanggal: tanggal // ← penting
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        const jumlahCell = document.querySelector(
                            `.jumlah-kehadiran[data-id="${idPersonil}-${hari}"]`);
                        const totalHariCell = document.querySelector(
                            `.total-kehadiran[data-hari="${hari}"]`);
                        const totalJamCell = document.querySelector(
                            `.jumlah-jam-terisi[data-id="${idPersonil}-${hari}"]`);
                        const persenCell = document.querySelector(
                            `.persentase-kehadiran[data-id="${idPersonil}-${hari}"]`);
                        const totalProsentaseCell = document.querySelector(
                            `.total-prosentase[data-hari="${hari}"]`);

                        let currentValue = parseInt(jumlahCell.textContent);
                        let totalHariValue = parseInt(totalHariCell.textContent);
                        let totalJam = parseInt(totalJamCell.textContent);

                        if (data.status === 'success') {
                            if (data.action === 'created') {
                                showToast('success', 'Kehadiran sukses disimpan!');
                                jumlahCell.textContent = currentValue + 1;
                                totalHariCell.textContent = totalHariValue + 1;

                                let persen = totalJam > 0 ? Math.round(((currentValue + 1) / totalJam) *
                                    100) : 0;
                                if (persenCell) persenCell.textContent = `${persen}%`;

                                if (totalProsentaseCell) {
                                    const totalJadwal = parseInt(totalProsentaseCell.getAttribute(
                                        'data-total-jadwal'));
                                    const totalHadirValue = parseInt(totalHariCell.textContent);
                                    const persenTotal = totalJadwal > 0 ? Math.round((totalHadirValue /
                                        totalJadwal) * 100) : 0;
                                    totalProsentaseCell.textContent = `${persenTotal}%`;
                                }

                            } else if (data.action === 'deleted') {
                                showToast('success', 'Kehadiran sukses dihapus!');
                                let newJumlah = currentValue > 0 ? currentValue - 1 : 0;
                                let newTotalHari = totalHariValue > 0 ? totalHariValue - 1 : 0;

                                jumlahCell.textContent = newJumlah;
                                totalHariCell.textContent = newTotalHari;

                                let persen = totalJam > 0 ? Math.round((newJumlah / totalJam) * 100) :
                                    0;
                                if (persenCell) persenCell.textContent = `${persen}%`;

                                if (totalProsentaseCell) {
                                    const totalJadwal = parseInt(totalProsentaseCell.getAttribute(
                                        'data-total-jadwal'));
                                    const totalHadirValue = parseInt(totalHariCell.textContent);
                                    const persenTotal = totalJadwal > 0 ? Math.round((totalHadirValue /
                                        totalJadwal) * 100) : 0;
                                    totalProsentaseCell.textContent = `${persenTotal}%`;
                                }
                            }
                        } else {
                            showToast('error', 'Gagal menyimpan kehadiran');
                            target.classList.toggle('bg-primary');
                            target.classList.toggle('text-white');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        showToast('error', 'Terjadi kesalahan!');
                        target.classList.toggle('bg-primary');
                        target.classList.toggle('text-white');
                    });
            });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
