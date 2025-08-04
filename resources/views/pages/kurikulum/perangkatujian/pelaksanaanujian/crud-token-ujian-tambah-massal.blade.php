<div class="modal fade" id="modalTokenMassal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <form id="formTokenSimpanMassal">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Massal Token Ujian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="massal_tanggal_ujian" class="form-label">Tanggal Ujian</label>
                            <select id="massal_tanggal_ujian" name="tanggal_ujian" class="form-select" required>
                                <option value="">-- Pilih Tanggal --</option>
                                @foreach ($tanggalUjianOption as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Jam Ke</label>
                            <select id="massal_jam_ke" name="jam_ke" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Tingkat</label>
                            <select name="tingkat" id="massal_tingkat" class="form-select w-auto">
                                <option value="">Pilih Tingkat</option>
                                @for ($i = 10; $i <= 12; $i++)
                                    <option value="{{ $i }}">Tingkat {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Kompetensi Keahlian</label>
                            <select id="massal_kode_kk" name="kode_kk" class="form-select" required>
                                <option value="">-- Pilih KK --</option>
                                @foreach ($kompetensiKeahlian as $kk)
                                    <option value="{{ $kk->idkk }}">{{ $kk->nama_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="massal_token_wrap"></div>
                </div>
                <div class="modal-footer">
                    <x-form.modal-footer-button id=" " label="Simpan" icon="ri-save-2-fill" />
                </div>
            </div>
        </form>
    </div>
</div>
