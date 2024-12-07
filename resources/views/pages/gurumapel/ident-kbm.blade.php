<div class="col-xl-6 col-md-6">
    <!-- Rounded Ribbon -->
    <div class="card ribbon-box border shadow-none mb-lg-3">
        <div class="card-body">
            <div class="ribbon ribbon-primary round-shape">Identitas KBM</div>
            <h5 class="fs-14 text-end"></h5>
            <div class="ribbon-content mt-4 text-muted">
                <div class="pt-4">
                    <div class="d-flex mb-2">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted fs-14 mb-0"><i
                                    class="mdi mdi-circle align-middle text-danger me-2"></i>Guru Pengajar
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0">{{ $fullName }}</p>
                        </div>
                    </div><!-- end -->
                    <div class="d-flex mb-2">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted fs-14 mb-0"><i
                                    class="mdi mdi-circle align-middle text-primary me-2"></i>Tahun
                                Ajaran
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0">{{ $data->tahunajaran }}</p>
                        </div>
                    </div><!-- end -->
                    <div class="d-flex mb-2">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted fs-14 mb-0"><i
                                    class="mdi mdi-circle align-middle text-info me-2"></i>Semester
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0">{{ $data->ganjilgenap }} / {{ $data->semester }}</p>
                        </div>
                    </div><!-- end -->
                    <div class="d-flex mb-2">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted fs-14 mb-0"><i
                                    class="mdi mdi-circle align-middle text-success me-2"></i>Rombongan
                                Belajar
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0">{{ $data->kode_rombel }} / {{ $data->rombel }}</p>
                        </div>
                    </div><!-- end -->
                    <div class="d-flex mb-2">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted fs-14 mb-0"><i
                                    class="mdi mdi-circle align-middle text-warning me-2"></i>Mata
                                Pelajaran
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0">{{ $data->kel_mapel }} / {{ $data->mata_pelajaran }}</p>
                        </div>
                    </div><!-- end -->
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted fs-14 mb-0"><i
                                    class="mdi mdi-circle align-middle text-danger me-2"></i>KKM
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0">{{ $data->kkm }}</p>
                        </div>
                    </div><!-- end -->
                </div><!-- end -->
            </div>
        </div>
    </div>
</div><!-- end col -->
