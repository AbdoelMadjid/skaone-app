<x-form.modal size="xl" title="{{ __('translation.peserta-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-3">
                    <x-form.select name="nomor_ruang" label="Nomor Ruangan" :options="$ruanganOptions" id="nomor_ruang"
                        value="{{ old('nomor_ruang', $data->nomor_ruang) }}" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <x-form.input name="kelas_kiri" value="{{ $data->kelas_kiri }}" label="Kelas Kiri" id="kelas_kiri"
                        readonly />
                </div>
                <div class="col-sm-3">
                    <x-form.input name="kelas_kanan" value="{{ $data->kelas_kanan }}" label="Kelas Kanan"
                        id="kelas_kanan" readonly />
                </div>
                <div class="col-sm-3">
                    <x-form.input name="kode_kelas_kiri" value="{{ $data->kode_kelas_kiri }}" label="Kode Kelas Kiri"
                        id="kode_kelas_kiri" readonly />
                </div>
                <div class="col-sm-3">
                    <x-form.input name="kode_kelas_kanan" value="{{ $data->kode_kelas_kanan }}" label="Kode Kelas Kanan"
                        id="kode_kelas_kanan" readonly />
                </div>
                <input type="hidden" name="kelas_kiri" value="{{ $data->kelas_kiri }}">
                <input type="hidden" name="kelas_kanan" value="{{ $data->kelas_kanan }}">
                <input type="hidden" name="kode_kelas_kiri" value="{{ $data->kode_kelas_kiri }}">
                <input type="hidden" name="kode_kelas_kanan" value="{{ $data->kode_kelas_kanan }}">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h5>Daftar Siswa Kelas Kiri</h5>
                    <div id="info-kiri">
                        <strong>Kode Rombel:</strong> <span id="kiri_kode_rombel"></span><br>
                        <strong>Kode KK:</strong> <span id="kiri_kode_kk"></span><br>
                        <strong>Tingkat:</strong> <span id="kiri_tingkat"></span><br>
                        <strong>Nama Rombel:</strong> <span id="kiri_rombel_nama"></span><br>
                        <strong>Kompetensi Keahlian:</strong> <span id="kiri_nama_kk"></span><br>
                    </div>
                    <table class="table table-bordered" id="siswa-table-kiri">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>
                                    Pilih<br>
                                    <input type="checkbox" id="check-all-kiri">
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="col-6">
                    <h5>Daftar Siswa Kelas Kanan</h5>
                    <div id="info-kanan">
                        <strong>Kode Rombel:</strong> <span id="kanan_kode_rombel"></span><br>
                        <strong>Kode KK:</strong> <span id="kanan_kode_kk"></span><br>
                        <strong>Tingkat:</strong> <span id="kanan_tingkat"></span><br>
                        <strong>Nama Rombel:</strong> <span id="kanan_rombel_nama"></span><br>
                        <strong>Kompetensi Keahlian:</strong> <span id="kanan_nama_kk"></span><br>
                    </div>
                    <table class="table table-bordered" id="siswa-table-kanan">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>
                                    Pilih<br>
                                    <input type="checkbox" id="check-all-kanan">
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
</x-form.modal>

<script>
    $('#nomor_ruang').on('change', function() {
        var nomorRuang = $(this).val();

        if (nomorRuang) {
            $.ajax({
                url: '{{ url('kurikulum/perangkatujian/get-ruang-ujian') }}/' + nomorRuang,
                type: 'GET',
                success: function(data) {
                    $('#kelas_kiri').val(data.kelas_kiri);
                    $('#kelas_kanan').val(data.kelas_kanan);
                    $('#kode_kelas_kiri').val(data.kode_kelas_kiri);
                    $('#kode_kelas_kanan').val(data.kode_kelas_kanan);

                    // Panggil dua tabel
                    loadSiswaTable(data.kelas_kiri, 'kiri');
                    loadSiswaTable(data.kelas_kanan, 'kanan');
                },
                error: function() {
                    $('#kelas_kiri').val('');
                    $('#kelas_kanan').val('');
                    $('#kode_kelas_kiri').val('');
                    $('#kode_kelas_kanan').val('');
                    $('#siswa-table-kiri tbody').empty();
                    $('#siswa-table-kanan tbody').empty();
                    alert('Gagal mengambil data ruang ujian.');
                }
            });
        } else {
            $('#kelas_kiri').val('');
            $('#kelas_kanan').val('');
            $('#kode_kelas_kiri').val('');
            $('#kode_kelas_kanan').val('');
            $('#siswa-table-kiri tbody').empty();
            $('#siswa-table-kanan tbody').empty();
        }
    });

    function loadSiswaTable(kodeKelas, posisi = 'kiri') {
        $.ajax({
            url: '{{ url('kurikulum/perangkatujian/get-siswa-kelas') }}/' + kodeKelas,
            type: 'GET',
            success: function(data) {
                let tbody = posisi === 'kiri' ? $('#siswa-table-kiri tbody') : $(
                    '#siswa-table-kanan tbody');
                tbody.empty();

                if (data.length === 0) {
                    tbody.append('<tr><td colspan="4" class="text-center">Tidak ada data siswa</td></tr>');
                    return;
                }

                // Set info rombel di atas tabel
                if (posisi === 'kiri') {
                    $('#kiri_kode_rombel').text(data[0].kode_rombel);
                    $('#kiri_kode_kk').text(data[0].kode_kk);
                    $('#kiri_tingkat').text(data[0].rombel_tingkat);
                    $('#kiri_rombel_nama').text(data[0].rombel_nama);
                    $('#kiri_nama_kk').text(data[0].nama_kk);
                } else {
                    $('#kanan_kode_rombel').text(data[0].kode_rombel);
                    $('#kanan_kode_kk').text(data[0].kode_kk);
                    $('#kanan_tingkat').text(data[0].rombel_tingkat);
                    $('#kanan_rombel_nama').text(data[0].rombel_nama);
                    $('#kanan_nama_kk').text(data[0].nama_kk);
                }

                data.forEach(function(item, index) {
                    tbody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.nis}</td>
                        <td>${item.nama_lengkap}</td>
                        <td>
                            <input type="checkbox"
                                class="siswa-checkbox-${posisi}"
                                name="siswa_${posisi}[]"
                                value="${item.nis}">
                        </td>
                    </tr>
                `);
                });
            },
            error: function() {
                alert('Gagal mengambil data siswa.');
            }
        });
    }

    // Ceklist semua untuk siswa tabel kanan
    $('#check-all-kanan').on('change', function() {
        $('#siswa-table-kanan tbody input[type="checkbox"]').prop('checked', $(this).is(':checked'));
    });

    // Ceklist semua untuk siswa tabel kiri
    $('#check-all-kiri').on('change', function() {
        $('#siswa-table-kiri tbody input[type="checkbox"]').prop('checked', $(this).is(':checked'));
    });

    $('form').on('submit', function() {
        // Tambahkan siswa yang dicentang sebagai input hidden jika perlu (tidak wajib jika checkbox sudah dalam form)
        const siswaKiri = $('.siswa-checkbox-kiri:checked');
        const siswaKanan = $('.siswa-checkbox-kanan:checked');

        if (siswaKiri.length === 0 && siswaKanan.length === 0) {
            alert('Silakan pilih minimal satu siswa.');
            return false; // cegah submit
        }

        return true;
    });
</script>
