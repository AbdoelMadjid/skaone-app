<div class="modal fade" id="distribusiPeserta" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('administratorpkl.simpanPesertaPrakerin') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Distribusi Mata Pelajaran Per Rombel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tahunajaran">Tahun Ajaran</label>
                            <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                                <option value="" selected>Pilih TA</option>
                                @foreach ($tahunAjaran as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_kk">Kompetensi Keahlian</label>
                            <select class="form-control mb-3" name="kode_kk" id="kode_kk" required>
                                <option value="" selected>Pilih Kompetensi Keahlian</option>
                                @foreach ($kompetensiKeahlian as $idkk => $nama_kk)
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Distribusikan</button>
                </div>
            </form>
        </div>
    </div>
</div>
