<!-- Modal untuk Generate Akun Peserta Didik -->
<div class="modal fade" id="generateNaikKelas" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="formNaikKelas" action="{{ route('kurikulum.datakbm.formgeneratenaikkelas') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Kenaikan Peserta Didik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Rounded Ribbon -->
                    <div class="card ribbon-box border shadow-none mb-lg-2">
                        <div class="card-body">
                            <div class="ribbon ribbon-primary round-shape">Rombel Tahun Ajaran Sebelumnya</div>
                            <h5 class="fs-14 text-end"></h5>
                            <div class="ribbon-content mt-5">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="tahunajaran">Tahun Ajaran</label>
                                        <select class="form-control mb-3" name="tahunajaran" id="tahunajaranNK1"
                                            required>
                                            <option value="" selected>Pilih TA</option>
                                            @foreach ($tahunAjaranOptions as $tahunajaran => $thajar)
                                                <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="kode_kk">Kompetensi Keahlian</label>
                                        <select class="form-control mb-3" name="kode_kk" id="kode_kk_NK1" required>
                                            <option value="" selected>Pilih Kompetensi Keahlian</option>
                                            @foreach ($kompetensiKeahlianOptions as $idkk => $nama_kk)
                                                <option value="{{ $idkk }}">{{ $nama_kk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tingkat">Tingkat</label>
                                        <select class="form-control mb-3" name="tingkat" id="tingkatNK1" required>
                                            <option value="" selected>Pilih Tingkat</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="rombel">Rombel/Kelas</label>
                                        <select class="form-control mb-3" name="rombel" id="rombelNK1" required>
                                            <option value="">Pilih Rombel</option>
                                        </select>
                                        <input type="hidden" id="rombel_namaNK1" name="rombel_namaNK1" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card ribbon-box border shadow-none mb-lg-2">
                        <div class="card-body">
                            <div class="ribbon ribbon-primary round-shape">Rombel Tahun Ajaran Baru</div>
                            <h5 class="fs-14 text-end"></h5>
                            <div class="ribbon-content mt-5">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="tahunajaran">Tahun Ajaran</label>
                                        <select class="form-control mb-3" name="tahunajaran" id="tahunajaranNK2"
                                            required>
                                            <option value="" selected>Pilih TA</option>
                                            @foreach ($tahunAjaranOptions as $tahunajaran => $thajar)
                                                <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="kode_kk">Kompetensi Keahlian</label>
                                        <select class="form-control mb-3" name="kode_kk" id="kode_kk_NK2" required>
                                            <option value="" selected>Pilih Kompetensi Keahlian</option>
                                            @foreach ($kompetensiKeahlianOptions as $idkk => $nama_kk)
                                                <option value="{{ $idkk }}">{{ $nama_kk }}</option>
                                            @endforeach
                                        </select>
                                        <small id="notifikasi_kk_tidak_sama" class="text-danger d-none">
                                            Kompetensi Keahlian tahun ajaran baru tidak sama dengan sebelumnya.
                                        </small>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tingkat">Tingkat</label>
                                        <select class="form-control mb-3" name="tingkat" id="tingkatNK2" required>
                                            <option value="" selected>Pilih Tingkat</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <small id="notifikasi_tingkat_tidak_valid" class="text-danger d-none">
                                            <!-- Pesan akan diisi dinamis lewat JS -->
                                        </small>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="rombel">Rombel/Kelas</label>
                                        <select class="form-control mb-3" name="rombel" id="rombelNK2" required>
                                            <option value="">Pilih Rombel</option>
                                        </select>
                                        <input type="hidden" name="rombel_nama" id="rombel_namaNK2">
                                        <div id="notif_koderombel" class="form-text text-danger mt-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="notif_kelulusan" class="alert alert-warning d-none mt-2">
                    Proses ini akan meluluskan siswa, bukan naik kelas.
                </div>
                <div id="selected_datasiswa_list_nk">
                    <!-- Tabel ini akan diisi dengan data peserta didik yang dipilih -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Pilih Semua <br>
                                    <input type="checkbox">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="selected_datasiswa_tbody_nk">
                            <!-- Baris data mapel yang dipilih akan muncul di sini -->
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <x-form.modal-footer-button id="submitNaikKelasBtn" label="Generate"
                        icon="ri-share-circle-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
