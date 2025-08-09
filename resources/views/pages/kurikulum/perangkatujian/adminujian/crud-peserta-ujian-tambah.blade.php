<div class="modal fade" id="pesertaUjianModal" tabindex="-1" aria-labelledby="pesertaUjianModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('kurikulum.perangkatujian.tambahpesertaujian') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="pesertaUjianModalLabel">Tambah Peserta Ujian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3 mb-lg-4">
                        <div class="col-lg">
                            <label for="nomor_ruang" class="form-label">Nomor Ruangan</label>
                            <select name="nomor_ruang" id="nomor_ruang" class="form-control">
                                <option value="">-- Pilih Ruang --</option>
                                @foreach ($ruanganOptions as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-auto">
                            <label for="kelas_kiri" class="form-label">Kelas Kiri</label>
                            <input type="text" class="form-control" name="kelas_kiri" id="kelas_kiri" readonly>
                        </div>
                        <div class="col-lg-auto">
                            <label for="kelas_kanan" class="form-label">Kelas Kanan</label>
                            <input type="text" class="form-control" name="kelas_kanan" id="kelas_kanan" readonly>
                        </div>
                        <div class="col-lg-auto">
                            <label for="kode_kelas_kiri" class="form-label">Kode Kelas Kiri</label>
                            <input type="text" class="form-control" name="kode_kelas_kiri" id="kode_kelas_kiri"
                                readonly>
                        </div>
                        <div class="col-lg-auto">
                            <label for="kode_kelas_kanan" class="form-label">Kode Kelas Kanan</label>
                            <input type="text" class="form-control" name="kode_kelas_kanan" id="kode_kelas_kanan"
                                readonly>
                        </div>
                    </div>

                    {{-- <input type="hidden" name="kelas_kiri" value="{{ $data->kelas_kiri }}">
                    <input type="hidden" name="kelas_kanan" value="{{ $data->kelas_kanan }}">
                    <input type="hidden" name="kode_kelas_kiri" value="{{ $data->kode_kelas_kiri }}">
                    <input type="hidden" name="kode_kelas_kanan" value="{{ $data->kode_kelas_kanan }}"> --}}

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Daftar Siswa Kelas Kiri</h5>
                            <div id="info-kiri" class="mb-2">
                                <strong>Kode Rombel:</strong> <span id="kiri_kode_rombel"></span><br>
                                <strong>Kode KK:</strong> <span id="kiri_kode_kk"></span><br>
                                <strong>Tingkat:</strong> <span id="kiri_tingkat"></span><br>
                                <strong>Nama Rombel:</strong> <span id="kiri_rombel_nama"></span><br>
                                <strong>Kompetensi Keahlian:</strong> <span id="kiri_nama_kk"></span><br>
                            </div>
                            <table class="table table-bordered" id="siswa-table-kiri">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>
                                            <div>
                                                <input type="checkbox" id="check-all-kiri"> Semua<br>
                                                <input type="checkbox" id="check-ganjil-kiri"> Ganjil<br>
                                                <input type="checkbox" id="check-setengah-kiri"> Setengah
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Daftar Siswa Kelas Kanan</h5>
                            <div id="info-kanan" class="mb-2">
                                <strong>Kode Rombel:</strong> <span id="kanan_kode_rombel"></span><br>
                                <strong>Kode KK:</strong> <span id="kanan_kode_kk"></span><br>
                                <strong>Tingkat:</strong> <span id="kanan_tingkat"></span><br>
                                <strong>Nama Rombel:</strong> <span id="kanan_rombel_nama"></span><br>
                                <strong>Kompetensi Keahlian:</strong> <span id="kanan_nama_kk"></span><br>
                            </div>
                            <table class="table table-bordered" id="siswa-table-kanan">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>
                                            <div>
                                                <input type="checkbox" id="check-all-kanan"> Semua<br>
                                                <input type="checkbox" id="check-ganjil-kanan"> Ganjil<br>
                                                <input type="checkbox" id="check-setengah-kanan"> Setengah
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <x-form.modal-footer-button id=" " label="Simpan" icon="ri-save-2-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
<script></script>
