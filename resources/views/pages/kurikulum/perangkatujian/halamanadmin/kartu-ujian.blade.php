<div class="row g-4 mb-3">
    <div class="col-sm-auto">
        <div>

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
<p class="mt-3"></p>
<div class="row" id="kartu-container">
    {{-- Kartu peserta akan dimuat di sini via AJAX --}}
</div>
