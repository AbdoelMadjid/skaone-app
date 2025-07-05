<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-file-user-line text-muted align-bottom me-1"></i> Daftar Hadir Peserta Per Ruangan
                </h3>
                <p>Pilih ruangan untuk proses cetak daftar hadir peserta ujian.</p>
            </div>
            <!--end col-->

            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select name="ruangan" id="ruangan" class="form-select form-select-sm w-auto">
                        <option value="">Pilih Ruangan</option>
                        @foreach ($ruangs as $ruang)
                            <option value="{{ $ruang }}">Ruangan {{ $ruang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select name="posisi_duduk" id="posisi_duduk" class="form-select form-select-sm w-auto">
                        <option value="">Pilih Kiri/Kanan</option>
                        <option value="kiri">Kiri</option>
                        <option value="kanan">Kanan</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-daftar-peserta">
                        Cetak
                    </button>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>


<div id="tabel-peserta"></div>
