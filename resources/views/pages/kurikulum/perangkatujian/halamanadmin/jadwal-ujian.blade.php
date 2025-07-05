<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <form id="form-pilih-tingkat">
            <div class="row g-3">
                <div class="col-lg">
                    <h3><i class="ri-list-unordered text-muted align-bottom me-1"></i> Jadwal Ujian</h3>
                    <p>Pilih tingkat untuk menampilkan jadwal ujian.</p>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <select name="tingkat" id="tingkat" class="form-select form-select-sm w-auto">
                            <option value="">Pilih Tingkat</option>
                            @for ($i = 10; $i <= 12; $i++)
                                <option value="{{ $i }}">Tingkat {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary btn-sm" id="btn-cetak-jadwal">
                            Cetak
                        </button>
                    </div>
                </div>
            </div>
            <!--end row-->
        </form>
    </div>
</div>

<div id="tabel-jadwal-ujian" class="mb-3">

</div>
