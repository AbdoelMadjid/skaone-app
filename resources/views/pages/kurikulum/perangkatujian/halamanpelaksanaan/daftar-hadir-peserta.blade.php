<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <form id="form-pilih-tingkat">
            <div class="row g-3">
                <div class="col-lg">
                    <h3>Daftar Hadir Peserta Per Ruangan</h3>
                    <p>Pilih ruangan untuk proses cetak daftar hadir peserta ujian.</p>
                </div>
                <!--end col-->

                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <select name="ruangan" id="ruangan" class="form-select w-auto">
                            <option value="">Pilih Ruangan</option>
                            @foreach ($ruangs as $ruang)
                                <option value="{{ $ruang }}">Ruangan {{ $ruang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <select name="posisi_duduk" id="posisi_duduk" class="form-select w-auto">
                            <option value="">Pilih Kiri/Kanan</option>
                            <option value="kiri">Kiri</option>
                            <option value="kanan">Kanan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary" id="btn-print-daftar-peserta">
                            Cetak
                        </button>
                    </div>
                </div>
            </div>
            <!--end row-->
        </form>
    </div>
</div>


<div id="tabel-peserta"></div>
