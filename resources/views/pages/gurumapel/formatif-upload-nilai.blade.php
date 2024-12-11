<div class="modal fade" id="modalUploadFormatif" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card ribbon-box border shadow-none mb-lg-0">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape mt-2">Upload File Excel</div>
                    <h5 class="fs-14 text-end"><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></h5>
                    <div class="ribbon-content mt-4 text-muted">
                        <!-- Vertical alignment (align-items-center) -->
                        <div class="row align-items-center">
                            <div class="col-sm-4">Guru Mata Pelajaran</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-info">{{ $fullName }}</div>
                            <div class="col-sm-4">Rombongan Belajar</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-info">{{ $kbmPerRombel->kode_rombel }} /
                                {{ $kbmPerRombel->rombel }}</div>
                            <div class="col-sm-4 align-self-start">Mata Pelajaran</div>
                            <div class="col-sm-1 align-self-start">:</div>
                            <div class="col-sm-7 text-info">{{ $kbmPerRombel->kel_mapel }} /
                                {{ $kbmPerRombel->mata_pelajaran }}</div>
                        </div>
                        <p class="mb-0"> </p>
                    </div>
                </div>
            </div>
            <form action="{{ route('gurumapel.penilaian.uploadformatif') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{--  <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file_excel" class="form-label">Pilih File Excel</label>
                        <input type="file" class="form-control" id="file_excel" name="file_excel" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
