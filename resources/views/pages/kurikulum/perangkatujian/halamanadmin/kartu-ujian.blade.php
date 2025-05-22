<div class="row g-4 mb-3">
    <div class="col-sm-auto">
        <div>
            <button class="btn btn-soft-info btn-sm" onclick="printContent('cetak-kartu-ujian')">
                Cetak</button>
        </div>
    </div>
    <div class="col-sm">
        <div class="d-flex justify-content-sm-end gap-2">
            <div class="form-group">
                <label for="kelas">Pilih Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($rombels as $kode_rombel => $rombel)
                        <option value="{{ $kode_rombel }}">{{ $rombel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">

    </div>
</div>
<div id="cetak-kartu-ujian">
    <p class="mt-3">KARTU UJIAN KELAS <span id="kelas-rombel"></span></p>
    <div class="kartu-peserta">
        <div class="row" id="kartu-container" style='@page {size: A4;}'>
            {{-- Kartu peserta akan dimuat di sini via AJAX --}}
        </div>
    </div>
</div>
