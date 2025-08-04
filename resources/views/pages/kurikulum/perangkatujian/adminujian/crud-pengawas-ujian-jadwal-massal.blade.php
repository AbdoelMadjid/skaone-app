<div class="modal fade" id="modalMassal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="formMassal">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Massal Jadwal Ujian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body"
                    style="max-height: calc(100vh - 200px); overflow-y: auto; margin-top:5px; margin-bottom:15px;">
                    <input type="hidden" name="kode_ujian" value="{{ $identitasUjian?->kode_ujian }}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Tanggal Ujian</label>
                            <select id="massal_tanggal_ujian" name="tanggal_ujian" class="form-select" required>
                                <option value="">-- Pilih Tanggal --</option>
                                @foreach ($tanggalUjianOption as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Jumlah Sesi</label>
                            <select id="massal_jml_sesi" name="jam_ke" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>

                    <div id="massal_table_wrap"></div>
                </div>
                <div class="modal-footer">
                    <x-form.modal-footer-button id=" " label="Simpan Massal" icon="ri-save-2-fill" />
                </div>
            </div>
        </form>
    </div>
</div>
