{{-- <div class="tab-pane active" id="personalDetails" role="tabpanel"> --}}
{{--     <form action="{{ route('profilpengguna.profil-pengguna.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') --}}

<h5 class="text-danger">Biodata Inti</h5>
<hr>
<div class="row">
    <div class="col-md-3">
        <x-form.input name="nis" value="{{ $pesertaDidik->nis }}" label="NIS" disabled />
        <input type="hidden" name="nis" value="{{ $pesertaDidik->nis }}">
    </div>
    <div class="col-md-3">
        <x-form.input name="nisn" value="{{ $pesertaDidik->nisn }}" label="NISN" disabled />
        <input type="hidden" name="nisn" value="{{ $pesertaDidik->nisn }}">
    </div>
    <div class="col-md-3">
        <x-form.select name="thnajaran_masuk" :options="$tahunAjaran"
            value="{{ old('thnajaran_masuk', $pesertaDidik->thnajaran_masuk) }}" label="Masuk Tahun Ajaran" disabled />
        <input type="hidden" name="thnajaran_masuk"
            value="{{ old('thnajaran_masuk', $pesertaDidik->thnajaran_masuk) }}">
    </div>
    <div class="col-md-3">
        <x-form.select name="kode_kk" :options="$kompetensiKeahlian" value="{{ old('kode_kk', $pesertaDidik->kode_kk) }}"
            label="Kompetensi Keahlian" disabled />
        <input type="hidden" name="kode_kk" value="{{ old('kode_kk', $pesertaDidik->kode_kk) }}">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <x-form.input name="nama_lengkap" value="{!! $pesertaDidik->nama_lengkap !!}" label="Nama Lengkap" />
    </div>
    <div class="col-md-3">
        <x-form.input name="tempat_lahir" value="{{ $pesertaDidik->tempat_lahir }}" label="Tempat Lahir" />
    </div>
    <div class="col-md-3">
        <x-form.input type="date" name="tanggal_lahir" value="{{ $pesertaDidik->tanggal_lahir }}"
            label="Tanggal Lahir" />
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <x-form.select name="jenis_kelamin" :options="['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']"
            value="{{ old('jenis_kelamin', $pesertaDidik->jenis_kelamin) }}" label="Jenis Kelamin" />
    </div>
    <div class="col-md-3">
        <x-form.select name="agama" :options="$agamaOptions" value="{{ old('agama', $pesertaDidik->agama) }}"
            label="Agama" />
    </div>
    <div class="col-md-4">
        <x-form.select name="status_dalam_kel" :options="[
            'Anak Kandung' => 'Anak Kandung',
            'Anak Angkat' => 'Anak Angkat',
            'Anak Tiri' => 'Anak Tiri',
        ]"
            value="{{ old('status_dalam_kel', $pesertaDidik->status_dalam_kel) }}" label="Status dalam Keluarga" />
    </div>
    <div class="col-md-2">
        <x-form.input name="anak_ke" value="{{ $pesertaDidik->anak_ke }}" label="Anak Ke" />
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <x-form.input name="sekolah_asal" value="{{ $pesertaDidik->sekolah_asal }}" label="Sekolah Asal" />
    </div>
    <div class="col-md-3">
        <x-form.select name="diterima_kelas" :options="['10' => '10', '11' => '11', '12' => '12']"
            value="{{ old('diterima_kelas', $pesertaDidik->diterima_kelas) }}" label="Diterima Kelas" disabled />
        <input type="hidden" name="diterima_kelas" value="{{ old('diterima_kelas', $pesertaDidik->diterima_kelas) }}">
    </div>
    <div class="col-md-3">
        <x-form.input type="date" name="diterima_tanggal" value="{{ $pesertaDidik->diterima_tanggal }}"
            label="Tanggal Diterima" disabled />
        <input type="hidden" name="diterima_tanggal" value="{{ $pesertaDidik->diterima_tanggal }}">
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <x-form.select name="asalsiswa" :options="['Siswa Baru' => 'Siswa Baru', 'Pindahan' => 'Pindahan']" value="{{ old('asalsiswa', $pesertaDidik->asalsiswa) }}"
            label="Asal Siswa" disabled />
        <input type="hidden" name="asalsiswa" value="{{ old('asalsiswa', $pesertaDidik->asalsiswa) }}">
    </div>
    <div class="col-md-8">
        <x-form.input name="keterangan_pindah" value="{{ $pesertaDidik->keterangan_pindah }}" label="Keterangan Pindah"
            disabled />
        <input type="hidden" name="keterangan_pindah"
            value="{{ old('keterangan_pindah', $pesertaDidik->keterangan_pindah) }}">
    </div>
</div>
<br>
<h5 class="text-danger">Alamat Siswa </h5>
<hr>
<div class="row">
    <div class="col-md-4">
        <x-form.input name="alamat_blok" value="{{ $pesertaDidik->alamat_blok }}" label="Alamat Blok" />
    </div>
    <div class="col-md-2">
        <x-form.input name="alamat_norumah" value="{{ $pesertaDidik->alamat_norumah }}" label="No Rumah" />
    </div>
    <div class="col-md-2">
        <x-form.input name="alamat_rt" value="{{ $pesertaDidik->alamat_rt }}" label="RT" />
    </div>
    <div class="col-md-2">
        <x-form.input name="alamat_rw" value="{{ $pesertaDidik->alamat_rw }}" label="RW" />
    </div>
    <div class="col-md-2">
        <x-form.input name="alamat_kodepos" value="{{ $pesertaDidik->alamat_kodepos }}" label="Kode Pos" />
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <x-form.input name="alamat_desa" value="{{ $pesertaDidik->alamat_desa }}" label="Desa" />
    </div>
    <div class="col-md-4">
        <x-form.input name="alamat_kec" value="{{ $pesertaDidik->alamat_kec }}" label="Kecamatan" />
    </div>
    <div class="col-md-4">
        <x-form.input name="alamat_kab" value="{{ $pesertaDidik->alamat_kab }}" label="Kabupaten/Kota" />
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-6">
        <h5 class="text-danger">Kontak Siswa </h5>
        <hr>
        <x-form.input name="kontak_telepon" value="{{ $pesertaDidik->kontak_telepon }}" label="Telepon" />
        <x-form.input type="email" name="kontak_email" value="{{ $pesertaDidik->kontak_email }}" label="Email"
            disabled />
        <input type="hidden" name="kontak_email" value="{{ $pesertaDidik->kontak_email }}">
        <p class="text-muted"><code>Untuk ganti email silakan hubungi Wali Kelas</code></p>

    </div>
    <div class="col-md-6">
        <h5 class='text-danger'>Status Siswa </h5>
        <hr>
        <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Pindah' => 'Pindah', 'Keluar' => 'Keluar']" value="{{ old('status', $pesertaDidik->status) }}"
            label="Status" disabled />
        <input type="hidden" name="status" value="{{ old('status', $pesertaDidik->status) }}">
        <x-form.input name="alasan_status" value="{{ $pesertaDidik->alasan_status }}" label="Alasan Status"
            disabled />
        <input type="hidden" name="alasan_status" value="{{ old('status', $pesertaDidik->alasan_status) }}">
    </div>
</div>
<hr>
{{--     <div class="col-lg-12">
        <div class="gap-2 hstack justify-content-end">
            <button type="submit" class="btn btn-primary">Updates</button>
        </div>
    </div> --}}
{{-- </form> --}}
@if (session('success'))
    <div id="session-message" data-message="{{ session('success') }}"></div>
@endif
{{-- </div> --}}
