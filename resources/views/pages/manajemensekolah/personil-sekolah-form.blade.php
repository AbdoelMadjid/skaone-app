<x-form.modal title="{{ __('translation.personil-sekolah') }}" action="{{ $action ?? null }}" enctype="multipart/form-data"
    scrollable>
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-3">
            <x-form.input name="id_personil" value="{{ $data->id_personil }}" label="ID Personil" disabled />
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <x-form.input name="nip" value="{{ $data->nip }}" label="NIP" />
        </div>
        <div class="col-md-2">
            <x-form.input name="gelardepan" value="{{ $data->gelardepan }}" label="Gelar Depan" />
        </div>
        <div class="col-md-5">
            <x-form.input name="namalengkap" value="{!! $data->namalengkap !!}" label="Nama Lengkap" />
        </div>
        <div class="col-md-2">
            <x-form.input name="gelarbelakang" value="{{ $data->gelarbelakang }}" label="Gelar Belakang" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="jeniskelamin" :options="['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']" value="{{ old('Laki-laki', $data->jeniskelamin) }}"
                label="Jenis Kelamin" />
        </div>
        <div class="col-md-6">
            <x-form.select name="jenispersonil" :options="['Kepala Sekolah' => 'Kepala Sekolah', 'Guru' => 'Guru', 'Tata Usaha' => 'Tata Usaha']" value="{{ old('Guru', $data->jenispersonil) }}"
                label="Jenis Personil" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="tempatlahir" value="{{ $data->tempatlahir }}" label="Tempat Lahir" />
        </div>
        <div class="col-md-6">
            <x-form.input type="date" name="tanggallahir" value="{{ $data->tanggallahir }}" label="Tanggal Lahir" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="agama" :options="$agamaOptions" :value="$data->agama" label="Agama" />

            <x-form.input type="email" name="kontak_email" value="{{ $data->kontak_email }}" label="Email" />

            <x-form.input name="kontak_hp" value="{{ $data->kontak_hp }}" label="Nomor HP" />
        </div>
        <div class="col-md-6">
            <x-form.select name="aktif" :options="[
                'Aktif' => 'Aktif',
                'Tidak Aktif' => 'Tidak Aktif',
                'Pensiun' => 'Pensiun',
                'Pindah' => 'Pindah',
                'Keluar' => 'Keluar',
            ]" value="{{ old('Aktif', $data->aktif) }}"
                label="Status Personil" />

            <div class="row">
                <div class="col-md-12">
                    <x-form.input name="photo" type="file" label="Photo" onchange="previewImage(event)" />
                </div>
                <div class="col-md-5">
                    <img id="image-preview"
                        src="{{ $data->photo && file_exists(base_path('images/personil/' . $data->photo)) ? asset('images/personil/' . $data->photo) : asset('build/images/users/user-dummy-img.jpg') }}"
                        width="150" alt="Photo" />
                </div>
            </div>
        </div>
    </div>
    <br>
    <h5 class="text-danger">Alamat Tempat Tinggal </h5>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="alamat_blok" value="{{ $data->alamat_blok }}" label="Alamat Blok" />
        </div>
        <div class="col-md-2">
            <x-form.input name="alamat_nomor" value="{{ $data->alamat_nomor }}" label="Alamat Nomor" />
        </div>
        <div class="col-md-3">
            <x-form.input name="alamat_rt" value="{{ $data->alamat_rt }}" label="RT" />
        </div>
        <div class="col-md-3">
            <x-form.input name="alamat_rw" value="{{ $data->alamat_rw }}" label="RW" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="alamat_desa" value="{{ $data->alamat_desa }}" label="Desa" />
        </div>
        <div class="col-md-6">
            <x-form.input name="alamat_kec" value="{{ $data->alamat_kec }}" label="Kecamatan" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="alamat_kab" value="{{ $data->alamat_kab }}" label="Kabupaten" />
        </div>
        <div class="col-md-6">
            <x-form.input name="alamat_prov" value="{{ $data->alamat_prov }}" label="Provinsi" />
        </div>
        <div class="col-md-6">
            <x-form.input name="alamat_kodepos" value="{{ $data->alamat_kodepos }}" label="Kode Pos" />
        </div>
    </div>
    <br>
    <h5 class="text-danger">Setting Profil</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <x-form.input type="file" name="bg_profil" label="Background Profil" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-form.textarea name="deskripsi_profil"
                label="Deskripsi Profil">{{ $data->deskripsi_profil }}</x-form.textarea>
        </div>
        <div class="col-md-12">
            <x-form.input name="motto_hidup" value="{{ $data->motto_hidup }}" label="Motto Hidup" />
        </div>
    </div>
</x-form.modal>
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result; // Set the src of the img to the file's data URL
            }
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.src =
                '{{ asset('build/images/users/user-dummy-img.jpg') }}'; // Reset to default if no file is selected
        }
    }
</script>
