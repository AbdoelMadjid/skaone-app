<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="uploadForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Perangkat Ajar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="tingkat" id="tingkatInput">
                    <input type="hidden" name="mata_pelajaran" id="mapelInput">
                    <div class="mb-3">
                        <label class="form-label">Analisis Waktu</label>
                        <input type="file" class="form-control" id='doc_analis_waktu' name="doc_analis_waktu"
                            accept="application/pdf">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capaian Pembelajaran (CP)</label>
                        <input type="file" class="form-control" id='doc_cp' name="doc_cp"
                            accept="application/pdf">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tujuan Pembelajaran (TP)</label>
                        <input type="file" class="form-control" id='doc_tp' name="doc_tp"
                            accept="application/pdf">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modul Ajar / RPP</label>
                        <input type="file" class="form-control" id='doc_rpp' name="doc_rpp"
                            accept="application/pdf">
                    </div>
                    <ul class="form-text text-danger mt-4">
                        <li>Type file: PDF</li>
                        <li>Maksimal kapasitas file: 5 MB</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <x-form.modal-footer-button id=" " label="Upload" icon="ri-upload-fill" />
                </div>
            </div>
        </form>
    </div>
</div>
