<!-- Modal Form -->
<div class="modal fade" id="jadwalModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="formJadwal">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="id" id="jadwal_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Jadwal Ujian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="kode_ujian" value="{{ $ujianAktif->kode_ujian ?? '' }}">

                    <div class="mb-2">
                        <label>Kompetensi Keahlian</label>
                        <select name="kode_kk" id="kode_kk" class="form-select" required>
                            <option value="">Pilih</option>
                            @foreach ($kompetensiKeahlian as $kk)
                                <option value="{{ $kk->idkk }}">{{ $kk->nama_kk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Tingkat</label>
                        <select name="tingkat" class="form-select" required>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Tanggal Ujian</label>
                        <select name="tanggal" class="form-select" required>
                            @foreach ($tanggalUjian as $tgl)
                                <option value="{{ $tgl }}">{{ $tgl }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Jam Ke</label>
                        <select name="jam_ke" id="jam_ke" class="form-select" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Jam Ujian</label>
                        <input type="text" class="form-control" name="jam_ujian" id="jam_ujian" readonly required>
                    </div>

                    <div class="mb-2">
                        <label>Mata Pelajaran</label>
                        <select name="mata_pelajaran" id="mata_pelajaran" class="form-select" required>
                            <option value="">Pilih Kompetensi Keahlian dahulu</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const jamUjian = {
        1: '07.30 - 08.30',
        2: '09.00 - 10.00',
        3: '10.30 - 11.30',
        4: '13.00 - 14.00'
    };

    $('#btnTambah').click(function() {
        $('#formJadwal')[0].reset();
        $('#formMethod').val('POST');
        $('#jadwal_id').val('');
        $('#mata_pelajaran').html('<option value="">Pilih Kompetensi Keahlian dahulu</option>');
        $('#jadwalModal').modal('show');
    });

    $('#kode_kk').change(function() {
        let kode_kk = $(this).val();
        $.get('/kurikulum/perangkatujian/get-mapel/' + kode_kk, function(data) {
            let options = '<option value="">Pilih Mata Pelajaran</option>';
            $.each(data, function(k, v) {
                options += `<option value="${v}">${v}</option>`;
            });
            $('#mata_pelajaran').html(options);
        });
    });

    $('#jam_ke').change(function() {
        let ke = $(this).val();
        $('#jam_ujian').val(jamUjian[ke]);
    });

    $('.btnEdit').click(function() {
        let id = $(this).data('id');
        $.get('/kurikulum/perangkatujian/administrasi-ujian/jadwal-ujian/' + id + '/edit', function(data) {
            $('#formMethod').val('PUT');
            $('#jadwal_id').val(data.id);
            $('#kode_kk').val(data.kode_kk).trigger('change');

            setTimeout(() => {
                $('#mata_pelajaran').val(data.mata_pelajaran);
            }, 500);

            $('[name=tingkat]').val(data.tingkat);
            $('[name=tanggal]').val(data.tanggal);
            $('[name=jam_ke]').val(data.jam_ke).trigger('change');
            $('#jam_ujian').val(data.jam_ujian);
            $('#jadwalModal').modal('show');
        });
    });

    $('#formJadwal').submit(function(e) {
        e.preventDefault();
        let id = $('#jadwal_id').val();
        let method = $('#formMethod').val();
        let url = method === 'POST' ? '/kurikulum/perangkatujian/administrasi-ujian/jadwal-ujian/store' :
            `/kurikulum/perangkatujian/administrasi-ujian/jadwal-ujian/${id}`;
        $.ajax({
            url: url,
            type: method === 'POST' ? 'POST' : 'PUT',
            data: $(this).serialize(),
            success: function() {
                location.reload();
            },
            error: function(err) {
                alert('Terjadi kesalahan');
                console.log(err.responseJSON);
            }
        });
    });
</script>
