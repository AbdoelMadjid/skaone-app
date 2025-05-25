<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body border-bottom-dashed border-bottom">
                <form id="form-pilih-tingkat">
                    <div class="row g-3">
                        <div class="col-lg">

                        </div>
                        <!--end col-->

                        <div class="col-lg-auto">
                            <div class="mb-3 d-flex align-items-center gap-2">
                                <label for="tingkat" class="form-label mb-0">Pilih Tingkat:</label>
                                <select name="tingkat" id="tingkat" class="form-select w-auto">
                                    <option value="">-- Pilih Tingkat --</option>
                                    @for ($i = 10; $i <= 13; $i++)
                                        <option value="{{ $i }}">Kelas {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<div id="tabel-jadwal-ujian" class="mb-3">

</div>
