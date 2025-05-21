<h4>Pilih Ruangan & Posisi Kelas</h4>
<div class="row mb-3">
    <div class="col-md-3">
        <label>Nomor Ruang</label>
        <select id="nomorRuang" class="form-control">
            @foreach ($ruangs as $ruang)
                <option value="{{ $ruang }}">{{ $ruang }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label>Layout Posisi Kelas</label>
        <select id="layout" class="form-control">
            <option value="4x5">4 Kolom x 5 Baris</option>
            <option value="5x4">5 Kolom x 4 Baris</option>
        </select>
    </div>
    <div class="col-md-3 align-self-end">
        <button class="btn btn-primary" onclick="loadDenah()">Tampilkan Denah</button>
    </div>
</div>

<div id="denah-container" class="mt-4"></div>
