@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-guru')
@endsection
@section('css')
    <style>
        .tblStat td {
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
                    <x-btn-group-dropdown size="sm">
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperrombel') }}" label="Rombel"
                            icon="ri-calendar-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperguru') }}" label="Guru"
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
                    <input type="date" id="inputTanggalKehadiran" name="tanggal" class="form-control">
                </div>

                <div class="col-lg-auto">
                    <select class="form-control" id="selectHari" name="hari">
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>
                <div class="col-lg-auto">
                    <button class="btn btn-soft-primary d-none" id="btnStatistik">Statistik</button>
                </div>
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
                    <table class="table table-bordered table-striped tblStat">
                        <tbody>
                            <tr>
                                <th style="width: 50%">Hari, Tanggal</th>
                                <td>
                                    <span id="statHari"></span>, <span id="statTanggal"></span>
                                </td>
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
                    <div class="mt-4">
                        <h6>Guru Tidak Hadir</h6>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:5%">No.</th>
                                    <th>Nama Guru</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyGuruTidakHadir">
                                <!-- Akan diisi via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalKeteranganTidakHadir" tabindex="-1" aria-labelledby="modalKeteranganTidakHadirLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="formKeteranganTidakHadir" action="{{ route('kurikulum.datakbm.simpanKeterangan') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalKeteranganTidakHadirLabel">Keterangan Ketidakhadiran Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">ID Personil</label>
                            <input type="text" name="id_personil" id="id_personil" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hari</label>
                            <input type="text" name="hari" id="hari" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Guru</label>
                            <input type="text" id="nama_guru" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        $(document).on('click', '.btn-keterangan-tidak-hadir', function() {
            const tanggalDipilih = $('#inputTanggalKehadiran').val(); // Ambil dari input tanggal di halaman

            $('#id_personil').val($(this).data('id-personil'));
            $('#nama_guru').val($(this).data('nama-guru'));
            $('#hari').val($(this).data('hari'));
            $('#tanggal').val(tanggalDipilih); // Set ke field modal
        });
    </script>

    <script>
        // taruh di bawah definisi fetchJadwal(...)
        window.refreshJadwalTanpaKedip = function(hari, tanggal) {
            if (!hari || !tanggal) return;
            // pakai silent=true biar nggak kedip
            fetchJadwal(hari, tanggal, {
                silent: true
            });
        };

        // simpan keterangan tidak hadir
        $(document).on('submit', '#formKeteranganTidakHadir', function(e) {
            e.preventDefault();

            const $form = $(this);
            const url = $form.attr('action'); // ← ambil dari action form
            const data = $form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // aman2an
                },
                success: function(res) {
                    if (res && res.status) {
                        $('#modalKeteranganTidakHadir').modal('hide');

                        // Notifikasi
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: res.message || 'Keterangan berhasil disimpan.',
                            timer: 1200,
                            showConfirmButton: false
                        });

                        // Refresh tabel TANPA kedip (pakai fungsi yang sudah berhasil kemarin)
                        if (typeof window.refreshJadwalTanpaKedip === 'function') {
                            const tgl = $('#inputTanggalKehadiran').val();
                            const hari = $('#selectHari').val();
                            window.refreshJadwalTanpaKedip(hari, tgl);
                        } else {
                            // fallback paling aman
                            location.reload();
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: (res && res.message) ? res.message :
                                'Gagal menyimpan keterangan.'
                        });
                    }
                },
                error: function(xhr) {
                    // 422 dari validator Laravel
                    if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                        const errors = xhr.responseJSON.errors;
                        const html = Object.values(errors).map(arr => arr.join('<br>')).join('<br>');
                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi gagal',
                            html
                        });
                        return;
                    }
                    // 419 CSRF / sesi
                    if (xhr.status === 419) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sesi kedaluwarsa',
                            text: 'Silakan muat ulang halaman.'
                        });
                        return;
                    }
                    // 409 (kalau kamu nanti pakai unique & ketemu duplikat)
                    if (xhr.status === 409 && xhr.responseJSON && xhr.responseJSON.message) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Duplikat',
                            text: xhr.responseJSON.message
                        });
                        return;
                    }
                    // Lain-lain
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan pada server.'
                    });
                    console.error(xhr.responseText || xhr);
                }
            });
        });

        // btn hapus keterangan tidak hadir
        $(document).on('click', '.btn-hapus-keterangan-tidak-hadir', function() {
            let id_personil = $(this).data('id-personil');
            let hari = $(this).data('hari');
            let tanggal = $('#inputTanggalKehadiran').val(); // ✅ sesuaikan dengan id input tanggal

            Swal.fire({
                title: 'Hapus keterangan?',
                text: "Keterangan akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('kurikulum.datakbm.hapusKeterangan') }}",
                        type: "DELETE",
                        data: {
                            id_personil: id_personil,
                            hari: hari,
                            tanggal: tanggal,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            Swal.fire('Berhasil!', res.message, 'success');
                            // Refresh tabel TANPA kedip (pakai fungsi yang sudah berhasil kemarin)
                            if (typeof window.refreshJadwalTanpaKedip === 'function') {
                                const tgl = $('#inputTanggalKehadiran').val();
                                const hari = $('#selectHari').val();
                                window.refreshJadwalTanpaKedip(hari, tgl);
                            } else {
                                // fallback paling aman
                                location.reload();
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Gagal!', xhr.responseJSON?.message ||
                                'Terjadi kesalahan', 'error');
                        }
                    });
                }
            });
        });
    </script>

    {{-- TAMPILKAN JADWAL UNTUK DI CEK KEHADIRAN --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectHari = document.getElementById('selectHari');
            const inputTanggal = document.getElementById('inputTanggalKehadiran');
            const container = document.getElementById('containerTableJadwal');
            const btnStatistik = document.getElementById('btnStatistik');

            // Sembunyikan tombol saat pertama kali
            btnStatistik.classList.add('d-none');

            // === helper: nama hari ===
            function getNamaHari(dateString) {
                const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const d = new Date(dateString);
                return hari[d.getDay()];
            }

            // === helper: fetch jadwal (dengan opsi silent biar gak kedip) ===
            function fetchJadwal(hari, tanggal, {
                silent = false
            } = {}) {
                if (!silent) {
                    // tampilkan loader ringan tapi tetap di dalam container
                    container.style.minHeight = container.offsetHeight + 'px'; // jaga tinggi biar gak "melompat"
                    container.innerHTML = '<div class="text-muted">Memuat jadwal...</div>';
                }

                return fetch(
                        `/kurikulum/datakbm/ajax-tampil?hari=${encodeURIComponent(hari)}&tanggal=${encodeURIComponent(tanggal)}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        container.innerHTML = data.html;
                        container.style.minHeight = ''; // lepas penjaga tinggi
                    })
                    .catch(error => {
                        console.error('Gagal memuat:', error);
                        container.innerHTML =
                            '<div class="alert alert-danger">Terjadi kesalahan saat memuat data.</div>';
                        container.style.minHeight = '';
                    });
            }

            // === expose ke global biar bisa dipanggil script lain ===
            window.getNamaHari = getNamaHari;
            window.fetchJadwal = fetchJadwal;

            // === ini menggantikan reload penuh: dipanggil dari script manual & massal ===
            window.simpanTanggalDanReload = function() {
                const tgl = inputTanggal.value;
                if (!tgl) return;
                const namaHari = getNamaHari(tgl);
                // refresh isi tabel saja, tanpa reload halaman (silent = true untuk minim kedip)
                fetchJadwal(namaHari, tgl, {
                    silent: true
                });
            };

            // (opsional) restore tanggal kalau sebelumnya sempat disimpan — aman walau sekarang gak dipakai
            const savedTanggal = localStorage.getItem('selectedTanggal');
            if (savedTanggal) {
                inputTanggal.value = savedTanggal;
                const namaHari = getNamaHari(savedTanggal);
                selectHari.value = namaHari;
                selectHari.disabled = true;
                fetchJadwal(namaHari, savedTanggal);
                btnStatistik.classList.remove('d-none');
                localStorage.removeItem('selectedTanggal');
            }

            // === event change tanggal (tetap seperti semula) ===
            inputTanggal.addEventListener('change', function() {
                const tgl = this.value;
                if (!tgl) {
                    btnStatistik.classList.add('d-none');
                    selectHari.disabled = true;
                    return;
                }

                const namaHari = getNamaHari(tgl);

                if (namaHari === 'Sabtu' || namaHari === 'Minggu') {
                    container.innerHTML =
                        `<div class="alert alert-warning">Tidak ada jadwal pada hari ${namaHari}.</div>`;
                    selectHari.value = '';
                    selectHari.disabled = true;
                    btnStatistik.classList.add('d-none');
                } else {
                    selectHari.value = namaHari;
                    selectHari.disabled = true; // tetap kunci agar konsisten
                    fetchJadwal(namaHari, tgl);
                    btnStatistik.classList.remove('d-none');
                }
            });

            // (opsional) jika dropdown hari-mu tetap bisa diganti manual
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
                btnStatistik.classList.remove('d-none');
            });
        });
    </script>


    {{-- CEK KEHADIRAN MASSAL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() { // Menunggu seluruh DOM selesai dimuat
            const container = document.getElementById(
                'containerTableJadwal'); // Ambil elemen container tabel jadwal
            const tanggalInput = document.getElementById('inputTanggalKehadiran'); // Ambil input tanggal kehadiran

            // Event listener untuk klik pada container tabel
            container.addEventListener('click', function(e) {
                const th = e.target.closest(
                    '.th-jam'); // Cari elemen header (th) dengan class "th-jam" yang diklik
                if (!th) return; // Jika bukan kolom jam, hentikan eksekusi

                const jamKe = th.dataset.jamKe; // Ambil nilai jam_ke dari atribut data
                const tanggal = tanggalInput.value; // Ambil tanggal yang dipilih user

                // Cari semua cell (td) di kolom yang sama berdasarkan jam_ke
                const tds = container.querySelectorAll(
                    `td[data-jam="${jamKe}"][data-id-jadwal][data-id-personil]`
                );

                let dataArray = []; // Array untuk menyimpan data yang akan dikirim ke server
                tds.forEach(td => {
                    // Toggle class untuk memberi highlight visual (menandai kehadiran)
                    td.classList.toggle('bg-primary');
                    td.classList.toggle('text-white');

                    // Masukkan data setiap cell ke dalam array
                    dataArray.push({
                        id_jadwal: td.dataset.idJadwal, // ID jadwal
                        id_personil: td.dataset.idPersonil, // ID guru/personil
                        hari: td.dataset.hari // Hari
                    });
                });

                // Kirim data ke server menggunakan fetch API
                fetch("{{ route('kurikulum.datakbm.simpankehadirangurumassal') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json", // Data dikirim dalam format JSON
                            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Token CSRF Laravel
                        },
                        body: JSON.stringify({
                            jam_ke: jamKe, // Jam ke yang dipilih
                            tanggal: tanggal, // Tanggal yang dipilih
                            data: dataArray // Data semua cell yang dipilih
                        })
                    })
                    .then(res => res.json()) // Parsing response JSON
                    .then(data => {
                        // Jika server mengembalikan status success dan ada array results
                        if (data.status === 'success' && Array.isArray(data.results)) {
                            // Loop setiap hasil update dari server
                            data.results.forEach(({
                                id_personil,
                                hari,
                                action
                            }) => {
                                // Ambil elemen terkait perhitungan statistik kehadiran
                                const jumlahCell = document.querySelector(
                                    `.jumlah-kehadiran[data-id="${id_personil}-${hari}"]`);
                                const totalHariCell = document.querySelector(
                                    `.total-kehadiran[data-hari="${hari}"]`);
                                const totalJamCell = document.querySelector(
                                    `.jumlah-jam-terisi[data-id="${id_personil}-${hari}"]`);
                                const persenCell = document.querySelector(
                                    `.persentase-kehadiran[data-id="${id_personil}-${hari}"]`
                                );
                                const totalProsentaseCell = document.querySelector(
                                    `.total-prosentase[data-hari="${hari}"]`
                                );

                                // Ambil nilai saat ini dari cell statistik
                                let currentValue = parseInt(jumlahCell.textContent);
                                let totalHariValue = parseInt(totalHariCell.textContent);
                                let totalJam = parseInt(totalJamCell.textContent);

                                // Update jumlah kehadiran berdasarkan action dari server
                                if (action === 'created') { // Jika kehadiran baru dibuat
                                    jumlahCell.textContent = currentValue + 1;
                                    totalHariCell.textContent = totalHariValue + 1;
                                } else { // Jika kehadiran dihapus
                                    jumlahCell.textContent = Math.max(currentValue - 1, 0);
                                    totalHariCell.textContent = Math.max(totalHariValue - 1, 0);
                                }

                                // Hitung nilai baru untuk persentase
                                let newJumlah = parseInt(jumlahCell.textContent);
                                let newTotalHari = parseInt(totalHariCell.textContent);

                                // Update persentase kehadiran individu guru
                                if (persenCell) persenCell.textContent =
                                    totalJam > 0 ?
                                    `${Math.round((newJumlah / totalJam) * 100)} %` : '0 %';

                                // Update persentase total kehadiran hari itu
                                if (totalProsentaseCell) {
                                    const totalJadwal = parseInt(totalProsentaseCell
                                        .getAttribute('data-total-jadwal'));
                                    totalProsentaseCell.textContent =
                                        totalJadwal > 0 ?
                                        `${Math.round((newTotalHari / totalJadwal) * 100)} %` :
                                        '0 %';
                                }
                            });

                            // Tampilkan notifikasi sukses
                            showToast('success', 'Kehadiran massal berhasil diupdate!');
                            // Simpan tanggal di storage & reload halaman
                            simpanTanggalDanReload();
                        } else {
                            // Jika gagal menyimpan kehadiran
                            showToast('error', 'Gagal menyimpan massal');
                        }
                    })
                    .catch(err => {
                        console.error(err); // Log error ke console
                        showToast('error', 'Terjadi kesalahan!'); // Notifikasi error
                    });
            });
        });
    </script>


    {{-- CEK KEHADIRAN MANUAL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() { // Tunggu sampai semua elemen HTML selesai dimuat
            const container = document.getElementById('containerTableJadwal'); // Ambil container tabel jadwal

            // Event listener untuk menangani klik pada cell kehadiran
            container.addEventListener('click', function(e) {
                const target = e.target.closest(
                '.cell-kehadiran'); // Cari elemen dengan class "cell-kehadiran" yang diklik
                if (!target) return; // Jika bukan cell kehadiran, hentikan

                // Ambil data dari atribut data-*
                const idJadwal = target.dataset.idJadwal; // ID jadwal mingguan
                const idPersonil = target.dataset.idPersonil; // ID guru/personil
                const hari = target.dataset.hari; // Nama hari
                const jam = target.dataset.jam; // Jam ke
                const tanggal = document.getElementById('inputTanggalKehadiran')
                .value; // Tanggal yang dipilih

                // Toggle warna cell secara optimis (langsung ubah UI sebelum response server)
                target.classList.toggle('bg-primary');
                target.classList.toggle('text-white');

                // Kirim request ke server untuk menyimpan/hapus kehadiran guru
                fetch("{{ route('kurikulum.datakbm.simpankehadiranguru') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json", // Kirim data dalam format JSON
                            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Token keamanan Laravel
                        },
                        body: JSON.stringify({
                            jadwal_mingguan_id: idJadwal, // ID jadwal
                            id_personil: idPersonil, // ID guru
                            hari: hari, // Hari
                            jam_ke: jam, // Jam ke
                            tanggal: tanggal // Tanggal kehadiran
                        })
                    })
                    .then(res => res.json()) // Ubah response menjadi JSON
                    .then(data => {
                        // Ambil elemen-elemen yang akan diupdate
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

                        // Ambil nilai saat ini dari tabel statistik
                        let currentValue = parseInt(jumlahCell.textContent);
                        let totalHariValue = parseInt(totalHariCell.textContent);
                        let totalJam = parseInt(totalJamCell.textContent);

                        if (data.status === 'success') { // Jika request sukses
                            if (data.action === 'created') { // Jika kehadiran baru dibuat
                                showToast('success', 'Kehadiran sukses disimpan!');
                                jumlahCell.textContent = currentValue + 1; // Tambah jumlah hadir guru
                                totalHariCell.textContent = totalHariValue +
                                1; // Tambah total hadir di hari itu

                                // Hitung ulang persentase kehadiran guru
                                let persen = totalJam > 0 ? Math.round(((currentValue + 1) / totalJam) *
                                    100) : 0;
                                if (persenCell) persenCell.textContent = `${persen} %`;

                                // Hitung ulang persentase total kehadiran hari itu
                                if (totalProsentaseCell) {
                                    const totalJadwal = parseInt(totalProsentaseCell.getAttribute(
                                        'data-total-jadwal'));
                                    const totalHadirValue = parseInt(totalHariCell.textContent);
                                    const persenTotal = totalJadwal > 0 ? Math.round((totalHadirValue /
                                        totalJadwal) * 100) : 0;
                                    totalProsentaseCell.textContent = `${persenTotal} %`;
                                }

                            } else if (data.action === 'deleted') { // Jika kehadiran dihapus
                                showToast('success', 'Kehadiran sukses dihapus!');
                                let newJumlah = currentValue > 0 ? currentValue - 1 : 0;
                                let newTotalHari = totalHariValue > 0 ? totalHariValue - 1 : 0;

                                jumlahCell.textContent = newJumlah; // Kurangi jumlah hadir guru
                                totalHariCell.textContent =
                                newTotalHari; // Kurangi total hadir di hari itu

                                // Hitung ulang persentase kehadiran guru
                                let persen = totalJam > 0 ? Math.round((newJumlah / totalJam) * 100) :
                                0;
                                if (persenCell) persenCell.textContent = `${persen} %`;

                                // Hitung ulang persentase total kehadiran hari itu
                                if (totalProsentaseCell) {
                                    const totalJadwal = parseInt(totalProsentaseCell.getAttribute(
                                        'data-total-jadwal'));
                                    const totalHadirValue = parseInt(totalHariCell.textContent);
                                    const persenTotal = totalJadwal > 0 ? Math.round((totalHadirValue /
                                        totalJadwal) * 100) : 0;
                                    totalProsentaseCell.textContent = `${persenTotal} %`;
                                }
                            }
                            simpanTanggalDanReload(); // Simpan tanggal terakhir & reload halaman

                        } else { // Jika request gagal
                            showToast('error', 'Gagal menyimpan kehadiran');
                            // Kembalikan warna cell ke semula
                            target.classList.toggle('bg-primary');
                            target.classList.toggle('text-white');
                        }
                    })
                    .catch(err => {
                        console.error(err); // Log error
                        showToast('error', 'Terjadi kesalahan!');
                        // Kembalikan warna cell ke semula jika error
                        target.classList.toggle('bg-primary');
                        target.classList.toggle('text-white');
                    });
            });
        });
    </script>


    {{-- TAMPILKAN STATISTIK KEHADIRAN --}}
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
                const prosentaseTidakHadir = prosentaseTidakHadirEl?.textContent.trim() || '0 %';

                // Hitung tidak hadir
                const jamTidakHadir = totalJam - jamHadir;

                // Tambahkan parsing angka
                const persenAngka = parseFloat(prosentaseTidakHadir.replace(' %', '')) || 0;
                const prosentaseHadir = (100 - persenAngka) + ' %';

                // Isi data ke modal
                document.getElementById('statTanggal').textContent = tanggal ? formatTanggalIndonesia(
                    tanggal) : '-';
                document.getElementById('statHari').textContent = hari || '-';
                document.getElementById('statTotalJam').textContent = totalJam + " jam";
                document.getElementById('statJamHadir').textContent = jamHadir + " jam";
                document.getElementById('statJamTidakHadir').textContent = jamTidakHadir + " jam";
                document.getElementById('statProsentaseAbsen').textContent = prosentaseTidakHadir;
                document.getElementById('statProsentaseHadir').textContent = prosentaseHadir;

                // Bersihkan tbody dulu
                const tbody = document.getElementById('tbodyGuruTidakHadir');
                tbody.innerHTML = '';

                // Ambil semua guru yang tidak hadir dari tabel utama
                const rowsGuru = document.querySelectorAll('tbody tr');
                let no = 1;

                rowsGuru.forEach(row => {
                    const namaGuru = row.querySelector('td')?.childNodes[0].textContent.trim();
                    const ketEl = row.querySelector('span.text-muted');
                    const keterangan = ketEl ? ketEl.textContent.replace('(', '').replace(')', '')
                        .trim() : '-';

                    if (row.querySelector(
                            '.btn-hapus-keterangan-tidak-hadir, .btn-keterangan-tidak-hadir')) {
                        // Masukkan ke tbody modal
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${no++}</td>
                            <td>${namaGuru}</td>
                            <td>${keterangan}</td>
                        `;
                        tbody.appendChild(tr);
                    }
                });

                // Tampilkan modal
                modalStatistik.show();
            });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
