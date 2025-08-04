<!-- Modal untuk Generate Akun Peserta Didik -->
<div class="modal fade" id="pilihCapaianPembelajaran" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="form_pilih_cp">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Pilih Capaian Pembelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"
                    style="max-height: calc(100vh - 200px); overflow-y: auto; margin-top:5px; margin-bottom:15px;">
                    <input type="hidden" name="tahunajaran" id="tahunajaran" value="{{ $tahunAjaran->tahunajaran }}">
                    <input type="hidden" name="ganjilgenap" id="ganjilgenap" value="{{ $semester->semester }}">
                    <input type="hidden" name="personal_id" id="personal_id" value="{{ $personal_id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="kel_mapel">Mata Pelajaran</label>
                            <select class="form-select mb-3" name="kel_mapel" id="kel_mapel" required>
                                <option value="" selected>Pilih Mata Pelajaran</option>
                                @foreach ($mapelOptions as $key => $item)
                                    <option value="{{ $item['kel_mapel'] }}" data-kel-mapel="{{ $item['kel_mapel'] }}"
                                        data-tingkat="{{ $item['tingkat'] }}">
                                        [ {{ $item['kel_mapel'] }} ] - ( {{ $item['tingkat'] }} ) :
                                        {{ $item['mata_pelajaran'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="tingkat" id="tingkat" value="">
                    <input type="hidden" name="semester" id="semester" value="">

                    <div class="row mb-4" id="rombel_pilih" style="display: none;">
                        <div class="col-md-4">
                            <label for="kode_rombel">Pilih Kode Rombel</label><br>
                            <div id="checkbox-kode-rombel"></div> {{-- value nya kode_rombel, optionsnya rombel --}}
                        </div>

                        <div class="col-md-4">
                            <label for="rombel">Pilih Rombel</label><br>
                            <div id="checkbox-rombel"></div> {{-- valuenya rombel option nya rombel --}}
                        </div>

                        <div class="col-md-4">
                            <label for="check_all">Kode Rombel dan Rombel</label><br>
                            <div class="form-check form-switch form-check-inline">
                                <input type="checkbox" id="check_all" class="form-check-input">
                                <label for="check_all" class="form-check-label">Check All</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="selected_rombel_ids" id="selected_rombel_ids" value=""
                        class="col-md-12">

                    <div id="selected_cp_list" style="display: none;">
                        <input type="hidden" name="selected_cp_ids" id="selected_cp_ids" value=""
                            class="col-md-12">
                        <input type="hidden" id="selected_cp_data" name="selected_cp_data" value=""
                            class="col-md-12">

                        <!-- Tabel ini akan diisi dengan data kode_mapel dan tingkat yang dipilih -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><input class="form-check-input" type="checkbox" id="checkAllCP"
                                            value="optionCP">
                                    </th>
                                    <th valign="middle">Kode CP - Tingkat - Fase</th>
                                    <th valign="middle">Element</th>
                                    <th valign="middle">Inisial MP / Nama Mata Pelajaran</th>
                                    <th valign="middle">Capaian Pembelajaran</th>
                                    <th valign="middle">Jumlah TP</th>
                                </tr>
                            </thead>
                            <tbody id="selected_cp_tbody">
                                <!-- Baris data capaian pembelajaran dengan kode_mapel dan tingkat yang dipilih akan muncul di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-soft-success btn-label" id="button-simpan"
                        style="display: none;"><i
                            class="ri-save-2-fill label-icon align-middle fs-16 me-2"></i>Simpan</button>
                    <button type="button" class="btn btn-soft-secondary btn-label" data-bs-dismiss="modal"><i
                            class="ri-shut-down-line label-icon align-middle fs-16 me-2"></i>Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
