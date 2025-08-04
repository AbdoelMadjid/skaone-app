<div class="modal fade" id="modalUploadSumatif" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Rounded Ribbon -->
            <div class="card ribbon-box border shadow-none mb-lg-0">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape mt-2">Upload File Excel</div>
                    <h5 class="fs-14 text-end"><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></h5>
                    <div class="ribbon-content mt-4 text-muted">
                        <!-- Vertical alignment (align-items-center) -->
                        <div class="row align-items-center">

                            <div class="col-sm-4">Kode Rombel</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-danger">
                                [ <span id="kodeRombel"></span> ]
                            </div>
                            <div class="col-sm-4">Rombel</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-info">
                                <span id="romBel"></span>
                            </div>
                            <div class="col-sm-4">Kelompok Mapel</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-danger">
                                [ <span id="kelMapel"></span> ]
                            </div>
                            <div class="col-sm-4">Mata Pelajaran</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-info">
                                <span id="namaMapel"></span>
                            </div>

                            <div class="col-sm-4">ID Personil</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-danger">
                                [ <span id="idPersonil"></span> ]
                            </div>
                            <div class="col-sm-4">Guru Mapel</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7 text-info">
                                <span id="gelarDepan"></span>
                                <span id="namaLengkap"></span>,
                                <span id="gelarBelakang"></span>
                            </div>
                        </div>
                        <p class="mb-0"> </p>
                    </div>
                </div>
            </div>
            <form action="{{ route('gurumapel.penilaian.uploadsumatif') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{--                 <div class="modal-header">
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
                    <x-form.modal-footer-button id=" " label="Upload" icon="ri-upload-2-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalUpload = document.getElementById('modalUploadSumatif');
        modalUpload.addEventListener('show.bs.modal', function(event) {
            // Tombol yang memicu modal
            const button = event.relatedTarget;

            // Ambil data dari atribut data-*
            const kodeRombel = button.getAttribute('data-kode-rombel');
            const romBel = button.getAttribute('data-rombel');
            const kelMapel = button.getAttribute('data-kel-mapel');
            const namaMapel = button.getAttribute('data-nama-mapel');
            const idPersonil = button.getAttribute('data-id-personil');
            const gelarDepan = button.getAttribute('data-gelar-depan');
            const namaLengkap = button.getAttribute('data-nama-lengkap');
            const gelarBelakang = button.getAttribute('data-gelar-belakang');

            // Update konten modal
            modalUpload.querySelector('#kodeRombel').textContent = kodeRombel;
            modalUpload.querySelector('#romBel').textContent = romBel;
            modalUpload.querySelector('#kelMapel').textContent = kelMapel;
            modalUpload.querySelector('#namaMapel').textContent = namaMapel;
            modalUpload.querySelector('#idPersonil').textContent = idPersonil;
            modalUpload.querySelector('#gelarDepan').textContent = gelarDepan;
            modalUpload.querySelector('#namaLengkap').textContent = namaLengkap;
            modalUpload.querySelector('#gelarBelakang').textContent = gelarBelakang;

        });
    });
</script>
