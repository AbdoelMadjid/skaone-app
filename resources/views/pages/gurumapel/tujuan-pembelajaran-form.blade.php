<!-- Modal untuk Generate Akun Peserta Didik -->
<div class="modal fade" id="buatMateriAjar" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-tp-ajar" action="{{ route('gurumapel.adminguru.savetujuanpembelajaran') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Tambah Tujuan Pembelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"
                    style="max-height: calc(100vh - 200px); overflow-y: auto; margin-top:5px; margin-bottom:15px;">

                    <input type="hidden" name="tahunajaran" id="tahunajaran" value="{{ $tahunAjaran->tahunajaran }}">
                    <input type="hidden" name="ganjilgenap" id="ganjilgenap" value="{{ $semester->semester }}">
                    <input type="hidden" name="semester" id="semester" value="">
                    <input type="hidden" name="tingkat" id="tingkat" value="">
                    <input type="hidden" name="personal_id" id="personal_id" value="{{ $personal_id }}">
                    <input type="hidden" name="selected_rombel_ids" id="selected_rombel_ids" class="col-md-12">
                    <input type="hidden" name="selected_tp_data" id="selected_tp_data">
                    <input type="hidden" name="jml_materi" id="jml_materi" value="">
                    <input type="hidden" name="kel_mapel" id="kel_mapel" class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="kode_cp">Capaian Pembelajaran</label>
                            <select class="form-control mb-3" name="kode_cp" id="kode_cp" required>
                                <option value="" selected>Pilih CP Terpilih</option>
                                @foreach ($cpOptions as $item)
                                    <option value="{{ $item['kode_cp'] }}" data-kel-mapel="{{ $item['kel_mapel'] }}"
                                        data-tingkat="{{ $item['tingkat'] }}"
                                        data-jml-materi="{{ $item['jml_materi'] }}"
                                        data-kode-rombel="{{ $item['kode_rombel'] }}">
                                        [{{ $item['kode_cp'] }}] - {{ $item['tingkat'] }} - {{ $item['fase'] }} -
                                        {{ $item['element'] }} -
                                        {{ $item['nama_matapelajaran'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12" id="tampil_cp" style="display: none;">
                        <div>
                            <label for="element_cp" class="form-label">Element</label>
                            <input class="form-control" type="text" name="element_cp" id="element_cp" value=""
                                readonly>
                        </div>
                        <div class="mt-3">
                            <label for="isi_cp" class="form-label">Isi Capaian Pembelajaran</label>
                            <textarea class="form-control" name="isi_cp" id="isi_cp" rows="5" readonly></textarea>
                        </div>
                    </div>

                    <div class="row mt-3" id="judul-tp" style="display: none;">
                        <div class="col-md-3">Kode TP dan Nomor Urut</div>
                        <div class="col-md-6">Isi Tujuan Pembelajaran</div>
                        <div class="col-md-3">Deskripsi Tujuan Pembelajaran</div>
                    </div>
                    <div id="ngisi_tp"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-soft-primary btn-label" id="button-simpan"
                        style="display: none;"><i
                            class="ri-save-2-fill label-icon align-middle fs-16 me-2"></i>Simpan</button>
                    <button type="button" class="btn btn-soft-secondary btn-label" data-bs-dismiss="modal"><i
                            class="ri-shut-down-line label-icon align-middle fs-16 me-2"></i>Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
