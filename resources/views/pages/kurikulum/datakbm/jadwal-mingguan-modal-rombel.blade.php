<!-- Modal Input Jadwal -->
<div class="modal fade" id="modalInputJadwal" tabindex="-1" aria-labelledby="modalInputJadwalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="formInputJadwal" method="POST" action="{{ route('kurikulum.datakbm.simpanJadwal') }}">
            @csrf
            <input type="hidden" name="tahunajaran" value="{{ $tahunAjaran }}">
            <input type="hidden" name="semester" value="{{ $semester }}">
            <input type="hidden" name="kode_kk" value="{{ $kodeKK }}">
            <input type="hidden" name="tingkat" value="{{ $tingkat }}">
            <input type="hidden" name="kode_rombel" value="{{ $kodeRombel }}">
            <input type="hidden" name="jam_ke" id="modalJamKe">
            <input type="hidden" name="hari" id="modalHari">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInputJadwalLabel">Isi Jadwal Rombel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Info Alert -->
                    <div class="alert alert-info alert-dismissible bg-info text-white alert-label-icon fade show"
                        role="alert" id="modalKeteranganWaktu">
                        <i class="ri-airplay-line label-icon"></i> Hari: <strong id="labelHari">-</strong> | Jam
                        ke-<strong id="labelJamKe">-</strong>
                    </div>
                    <div class="mb-2">
                        <label for="id_personil" class="form-label">Guru</label>
                        <select name="id_personil" id="modalGuru" class="form-select">
                            <option value="">-- Pilih Guru --</option>
                            @foreach ($guruList as $guru)
                                <option value="{{ $guru->id_personil }}">{{ $guru->namalengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="kode_mapel_rombel" class="form-label">Mata Pelajaran</label>
                        <select name="kode_mapel_rombel" id="modalMapel" class="form-select" disabled>
                            <option value="">-- Pilih Mata Pelajaran --</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="jumlah_jam" class="form-label">Jumlah Jam</label>
                        <select name="jumlah_jam" id="jumlahJamSelect" class="form-select">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }} jam</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
