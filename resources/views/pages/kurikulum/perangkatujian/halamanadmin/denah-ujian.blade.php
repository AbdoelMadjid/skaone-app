<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-checkbox-multiple-blank-line text-muted align-bottom me-1"></i> Denah Duduk Peserta Per
                    Ruangan</h3>
                <p>Pilih ruangan untuk proses cetak denah duduk peserta ujian.</p>
            </div>
            <!--end col-->
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select name="pilih_ruang" id="ruangan" class="form-select form-select-sm w-auto">
                        <option value="">Pilih Ruangan</option>
                        @foreach ($ruangs as $ruang)
                            <option value="{{ $ruang }}">Ruangan {{ $ruang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-denah-ujian">
                        <i class="ri-printer-line"></i> Denah
                    </button>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-daftar-peserta-ruangan">
                        <i class="ri-printer-line"></i> Daftar Peserta
                    </button>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-cetak-tempelan-meja">
                        <i class="ri-printer-line"></i> Tempelan Meja
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link mb-2 active" id="daftar-peserta-tab" data-bs-toggle="pill" href="#daftar-peserta"
                        role="tab" aria-controls="daftar-peserta" aria-selected="false">Daftar Peserta</a>
                    <a class="nav-link mb-2" id="denah-tempat-duduk-tab" data-bs-toggle="pill"
                        href="#denah-tempat-duduk" role="tab" aria-controls="denah-tempat-duduk"
                        aria-selected="true">Denah Tempat Duduk</a>
                    <a class="nav-link mb-2" id="denah-tempel-meja-tab" data-bs-toggle="pill" href="#denah-tempel-meja"
                        role="tab" aria-controls="denah-tempel-meja" aria-selected="true">Label Tempel Meja</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-9">
                <div class="tab-content mt-4 mt-md-0" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="daftar-peserta" role="tabpanel"
                        aria-labelledby="daftar-peserta-tab">
                        @include('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian-daftar-peserta')
                    </div>
                    <div class="tab-pane fade" id="denah-tempat-duduk" role="tabpanel"
                        aria-labelledby="denah-tempat-duduk-tab">
                        @include('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian-tempat-duduk')
                    </div>
                    <div class="tab-pane fade" id="denah-tempel-meja" role="tabpanel"
                        aria-labelledby="denah-tempel-meja-tab">
                        @include('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian-tempel-meja')
                    </div>
                </div>
            </div><!--  end col -->
        </div><!--end row-->
    </div><!-- end card-body -->
</div><!-- end card -->
