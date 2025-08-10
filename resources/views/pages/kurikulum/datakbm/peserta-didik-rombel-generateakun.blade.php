<!-- Modal untuk Generate Akun Peserta Didik -->
<div class="modal fade" id="generateAkun" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('kurikulum.datakbm.formgenerateakun') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Buat Akun Peserta Didik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"
                    style="max-height: calc(100vh - 200px); overflow-y: auto; margin-top:5px; margin-bottom:15px;">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tahunajaran">Tahun Ajaran</label>
                            <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                                <option value="" selected>Pilih TA</option>
                                @foreach ($tahunAjaranOptions as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                @endforeach
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
                        <div class="col-md-4">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control mb-3" name="tingkat" id="tingkat" required>
                                <option value="" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="kode_rombel">Pilih Kode Rombel</label><br>
                            <div id="checkbox-kode-rombel"></div>
                        </div>
                        <div class="col-md-3">
                            <label for="rombel">Pilih Rombel</label><br>
                            <div id="checkbox-rombel"></div>
                        </div>
                        <div class="col-md-3">
                            <label for="rombel">Jumlah Siswa</label><br>
                            <div id="jmlsiswa-rombel"></div>
                        </div>
                        <div class="col-md-3">
                            <label for="check_all">Kode Rombel dan Rombel</label><br>
                            <div class="form-check form-switch form-check-inline">
                                <input type="checkbox" id="check_all" class="form-check-input">
                                <label for="check_all" class="form-check-label">Check All</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Input hidden untuk menyimpan selected rombel IDs -->
                <input type="hidden" name="selected_rombel_ids" id="selected_rombel_ids">

                <div id="selected_datasiswa_list">
                    <!-- Tabel ini akan diisi dengan data peserta didik yang dipilih -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Rombel</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="selected_datasiswa_tbody">
                            <!-- Baris data mapel yang dipilih akan muncul di sini -->
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <x-form.modal-footer-button label="Generate" icon="ri-share-circle-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
