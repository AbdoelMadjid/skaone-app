<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <form id="form-pilih-tingkat">
            <div class="row g-3">
                <div class="col-lg">
                    <h3>Denah Duduk Peserta Per Ruangan</h3>
                    <p>Pilih ruangan untuk proses cetak denah duduk peserta ujian.</p>
                </div>
                <!--end col-->
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <select name="pilih_ruang" id="ruangan" class="form-select w-auto">
                            <option value="">Pilih Ruangan</option>
                            @foreach ($ruangs as $ruang)
                                <option value="{{ $ruang }}">Ruangan {{ $ruang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary" id="btn-print-denah-ujian">
                            Cetak Denah
                        </button>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary" id="btn-print-daftar-peserta-ruangan">
                            Cetak Daftar Peserta
                        </button>
                    </div>
                </div>
            </div>
            <!--end row-->
        </form>
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
                    <a class="nav-link mb-2" id="dena-tempat-duduk-tab" data-bs-toggle="pill" href="#dena-tempat-duduk"
                        role="tab" aria-controls="dena-tempat-duduk" aria-selected="true">Denah Tempat Duduk</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-9">
                <div class="tab-content mt-4 mt-md-0" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="daftar-peserta" role="tabpanel"
                        aria-labelledby="daftar-peserta-tab">
                        @include('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian-daftar-peserta')
                    </div>
                    <div class="tab-pane fade" id="dena-tempat-duduk" role="tabpanel"
                        aria-labelledby="dena-tempat-duduk-tab">
                        @include('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian-tempat-duduk')
                    </div>
                </div>
            </div><!--  end col -->
        </div><!--end row-->
    </div><!-- end card-body -->
</div><!-- end card -->
