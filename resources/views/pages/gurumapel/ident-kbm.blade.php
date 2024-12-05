<div class="col-xl-6 col-md-6">
    <div class="card card-height-100">
        <div class="card-header align-items-center d-flex bg-info-subtle">
            <h4 class="card-title mb-0 flex-grow-1">Identitas KBM</h4>
        </div>
        <div class="card-body">
            <div class="pt-2">
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
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->
