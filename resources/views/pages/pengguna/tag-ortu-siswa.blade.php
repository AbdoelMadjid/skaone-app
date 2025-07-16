{{-- <div class="tab-pane" id="ortusiswa" role="tabpanel"> --}}
{{--     <form action="{{ route('profilpengguna.simpanorangtuasiswa') }}" method="POST">
        @csrf
        @method('PUT') --}}
{{-- <div class="card">
    <div class="card-body"> --}}
<h5 class="text-danger">Data Orang Tua</h5>
<hr>
<div class="row">
    <div class="col-md-6">
        <x-form.input name="nis" value="{{ old('nis', $ortu->nis ?? auth()->user()->nis) }}" label="NIS" readonly />
    </div>
    <div class="col-md-6">
        <x-form.select name="status_ortu" :options="$statusOrtuOptions" value="{{ old('status_ortu', $ortu->status_ortu) }}"
            label="Status Dalam Keluarga" />
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <x-form.input name="nm_ayah" value="{{ old('nm_ayah', $ortu->nm_ayah ?? '') }}" label="Nama Ayah" />
    </div>
    <div class="col-md-6">
        <x-form.input name="nm_ibu" value="{{ old('nm_ibu', $ortu->nm_ibu ?? '') }}" label="Nama Ibu" />
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <x-form.select name="pekerjaan_ayah" :options="$pekerjaanOptions"
            value="{{ old('pekerjaan_ayah', $ortu->pekerjaan_ayah ?? '') }}" label="Pekerjaan Ayah" />
    </div>
    <div class="col-md-6">
        <x-form.select name="pekerjaan_ibu" :options="$pekerjaanOptions"
            value="{{ old('pekerjaan_ibu', $ortu->pekerjaan_ibu ?? '') }}" label="Pekerjaan Ibu" />
    </div>
</div>
<br>
<h5 class="text-danger">Alamat Orang Tua</h5>
<hr>
<div class="form-check mb-3">
    <input type="checkbox" class="form-check-input" id="sameAsStudentAddress" />
    <label class="form-check-label" for="sameAsStudentAddress">Alamat sama dengan alamat siswa</label>
</div>
<div class="row">
    <div class="col-md-4">
        <x-form.input name="ortu_alamat_blok" value="{{ old('ortu_alamat_blok', $ortu->ortu_alamat_blok ?? '') }}"
            label="Alamat Blok" id="ortu_alamat_blok" />
    </div>
    <div class="col-md-2">
        <x-form.input name="ortu_alamat_norumah"
            value="{{ old('ortu_alamat_norumah', $ortu->ortu_alamat_norumah ?? '') }}" label="No Rumah"
            id="ortu_alamat_norumah" />
    </div>
    <div class="col-md-2">
        <x-form.input name="ortu_alamat_rt" value="{{ old('ortu_alamat_rt', $ortu->ortu_alamat_rt ?? '') }}"
            label="RT" id="ortu_alamat_rt" />
    </div>
    <div class="col-md-2">
        <x-form.input name="ortu_alamat_rw" value="{{ old('ortu_alamat_rw', $ortu->ortu_alamat_rw ?? '') }}"
            label="RW" id="ortu_alamat_rw" />
    </div>
    <div class="col-md-2">
        <x-form.input name="ortu_alamat_kodepos"
            value="{{ old('ortu_alamat_kodepos', $ortu->ortu_alamat_kodepos ?? '') }}" label="Kode Pos"
            id="ortu_alamat_kodepos" />
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <x-form.input name="ortu_alamat_desa" value="{{ old('ortu_alamat_desa', $ortu->ortu_alamat_desa ?? '') }}"
            label="Desa" id="ortu_alamat_desa" />
    </div>
    <div class="col-md-4">
        <x-form.input name="ortu_alamat_kec" value="{{ old('ortu_alamat_kec', $ortu->ortu_alamat_kec ?? '') }}"
            label="Kecamatan" id="ortu_alamat_kec" />
    </div>
    <div class="col-md-4">
        <x-form.input name="ortu_alamat_kab" value="{{ old('ortu_alamat_kab', $ortu->ortu_alamat_kab ?? '') }}"
            label="Kabupaten/Kota" id="ortu_alamat_kab" />
    </div>
</div>
<!-- Input Hidden untuk Alamat Siswa -->
<input type="hidden" id="alamat_blok" value="{{ $pesertaDidik->alamat_blok }}">
<input type="hidden" id="alamat_norumah" value="{{ $pesertaDidik->alamat_norumah }}">
<input type="hidden" id="alamat_rt" value="{{ $pesertaDidik->alamat_rt }}">
<input type="hidden" id="alamat_rw" value="{{ $pesertaDidik->alamat_rw }}">
<input type="hidden" id="alamat_kodepos" value="{{ $pesertaDidik->alamat_kodepos }}">
<input type="hidden" id="alamat_desa" value="{{ $pesertaDidik->alamat_desa }}">
<input type="hidden" id="alamat_kec" value="{{ $pesertaDidik->alamat_kec }}">
<input type="hidden" id="alamat_kab" value="{{ $pesertaDidik->alamat_kab }}">
<br>
<h5 class="text-danger">Kontak Orang Tua</h5>
<hr>
<div class="row">
    <div class="col-md-6">
        <x-form.input name="ortu_kontak_telepon"
            value="{{ old('ortu_kontak_telepon', $ortu->ortu_kontak_telepon ?? '') }}" label="Telepon" />
    </div>
    <div class="col-md-6">
        <x-form.input name="ortu_kontak_email" value="{{ old('ortu_kontak_email', $ortu->ortu_kontak_email ?? '') }}"
            label="Email" />
    </div>
</div>

<br>
{{-- <div class="row">
                <div class="col-lg-12">
                    <div class="gap-2 hstack justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </div>
            </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{--  </form> --}}

{{-- </div> --}}
