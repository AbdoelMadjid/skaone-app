<div class="modal fade" id="modalMassal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <form id="formMassal">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Massal Jadwal Ujian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Kompetensi Keahlian</label>
                            <select id="massal_kode_kk" name="kode_kk" class="form-select" required>
                                <option value="">-- Pilih KK --</option>
                                @foreach ($kompetensiKeahlian as $kk)
                                    <option value="{{ $kk->idkk }}">{{ $kk->nama_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Tingkat</label>
                            <select id="massal_tingkat" name="tingkat" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>

                    <div id="massal_table_wrap"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Massal</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
