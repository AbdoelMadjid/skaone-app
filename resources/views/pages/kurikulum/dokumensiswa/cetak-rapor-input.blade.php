<div class="modal fade" id="pilihCetak" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('manajemensekolah.simpandistribusi') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Distribusi Peserta Didik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="tahunajaran">Tahun Ajaran</label>
                            <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                                <option value="" selected>Pilih TA</option>
                                @foreach ($tahunAjaranOptions as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="semester">Semester</label>
                            <select class="form-control mb-3" name="semester" id="semester" required>
                                <option value="" selected>Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
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
                        <div class="col-md-2">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control mb-3" name="tingkat" id="tingkat" required>
                                <option value="" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_rombel">Rombel</label>
                            <select class="form-control mb-3" name="kode_rombel" id="kode_rombel" required>
                                <option value="" selected>Pilih Rombel</option>
                                <!-- Rombel akan diisi dengan data dari AJAX -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nis">Peserta Didik</label>
                            <select class="form-control mb-3" name="nis" id="nis" required>
                                <option value="" selected>Pilih Siswa</option>
                                <!-- Rombel akan diisi dengan data dari AJAX -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Distribusikan</button>
                </div>
            </form>
        </div>
    </div>
</div>
