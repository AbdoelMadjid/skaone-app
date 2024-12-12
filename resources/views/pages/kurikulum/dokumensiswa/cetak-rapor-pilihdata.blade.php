<div class="row">
    <div class="col-md-8">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-0">
            <div class="card-body">
                <div class="ribbon ribbon-success round-shape">Pilih Data Cetak</div>
                <h5 class="fs-14 text-end">{{ $personal_id }}</h5>
                <div class="ribbon-content mt-5">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="tahunajaran">Tahun Ajaran</label>
                            <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                                <option value="" selected>Pilih TA</option>
                                @foreach ($tahunAjaranOptions as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="tingkat">Semester</label>
                            <select class="form-control mb-3" name="semester" id="semester" required>
                                <option value="" selected>Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_kk">Kompetensi Keahlian</label>
                            <select class="form-control mb-3" name="kode_kk" id="kode_kk" required>
                                <option value="" selected>Pilih Kompetensi Keahlian</option>
                                @foreach ($kompetensiKeahlianOptions as $idkk => $nama_kk)
                                    <option value="{{ $idkk }}">{{ $nama_kk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control mb-3" name="tingkat" id="tingkat" required>
                                <option value="" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_kk">Rombongan Belajar</label>
                            <select class="form-control mb-3" name="kode_rombel" id="kode_rombel" required>
                                <option value="" selected>Pilih Rombel</option>
                                @foreach ($rombelOptions as $kode_rombel => $rombel)
                                    <option value="{{ $kode_rombel }}">{{ $rombel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_peserta_didik">Peserta Didik</label>
                            <select class="form-control mb-3" name="kode_peserta_didik" id="kode_peserta_didik"
                                required>
                                <option value="" selected>Pilih Peserta Didik</option>
                                <!-- Data akan dimuat secara dinamis -->
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="gap-2 hstack justify-content-end">
                                <button type="submit" class="btn btn-soft-success">Simpan</button>
                                {{-- <button type="button" class="btn btn-soft-success">Cancel</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card ribbon-box border shadow-none mb-lg-0">
            <div class="card-body">
                <div class="ribbon ribbon-success round-shape">Proses Cetak</div>
                <h5 class="fs-14 text-end">{{ $tahunAjaranAktif->tahunajaran }}
                    {{ $semester->semester }}</h5>
                <div class="ribbon-content mt-4 text-muted">
                    <div class="d-grid gap-2">
                        <button class="btn btn-soft-info mt-3" onclick="printContent('printable-area-depan')">Cetak
                            Halaman Depan</button>
                        <button class="btn btn-soft-info mt-3" onclick="printContent('printable-area-nilai')">Cetak
                            Halaman Nilai</button>
                        <button class="btn btn-soft-info mt-3" onclick="printContent('printable-area-lampiran')">Cetak
                            Halaman Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        function updateRombelOptions() {
            const tahunajaran = $('#tahunajaran').val();
            const kode_kk = $('#kode_kk').val();
            const tingkat = $('#tingkat').val();

            if (tahunajaran && kode_kk && tingkat) {
                $.ajax({
                    url: '{{ route('kurikulum.dokumentsiswa.getrombeloptions') }}',
                    type: 'POST',
                    data: {
                        tahunajaran: tahunajaran,
                        kode_kk: kode_kk,
                        tingkat: tingkat,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#kode_rombel').empty().append(
                            '<option value="" selected>Pilih Rombel</option>');
                        $.each(data, function(key, value) {
                            $('#kode_rombel').append(
                                `<option value="${key}">${value}</option>`);
                        });
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat data rombel.');
                    }
                });
            } else {
                $('#kode_rombel').empty().append('<option value="" selected>Pilih Rombel</option>');
            }
        }

        $('#tahunajaran, #kode_kk, #tingkat').change(updateRombelOptions);

        function updatePesertaDidikOptions() {
            const tahunajaran = $('#tahunajaran').val();
            const kode_kk = $('#kode_kk').val();
            const tingkat = $('#tingkat').val();
            const kode_rombel = $('#kode_rombel').val();

            if (tahunajaran && kode_kk && tingkat && kode_rombel) {
                $.ajax({
                    url: '{{ route('kurikulum.dokumentsiswa.getpesertadidikoptions') }}',
                    type: 'POST',
                    data: {
                        tahunajaran: tahunajaran,
                        kode_kk: kode_kk,
                        tingkat: tingkat,
                        kode_rombel: kode_rombel,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#kode_peserta_didik').empty().append(
                            '<option value="" selected>Pilih Peserta Didik</option>');
                        $.each(data, function(key, value) {
                            $('#kode_peserta_didik').append(
                                `<option value="${value.nis}">${value.nama_lengkap}</option>`
                            );
                        });
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat data peserta didik.');
                    }
                });
            } else {
                $('#kode_peserta_didik').empty().append(
                    '<option value="" selected>Pilih Peserta Didik</option>');
            }
        }

        $('#tahunajaran, #kode_kk, #tingkat, #kode_rombel').change(updatePesertaDidikOptions);
    });
</script>
