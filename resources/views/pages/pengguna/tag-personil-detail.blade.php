<div class="tab-pane active" id="personalDetails" role="tabpanel">
    <form action="{{ route('profilpengguna.profil-pengguna.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-3">
                <x-form.input name="nip" value="{{ $personil->nip }}" label="NIP" />
            </div>
            <div class="col-md-2">
                <x-form.input name="gelardepan" value="{{ $personil->gelardepan }}" label="Gelar Depan" />
            </div>
            <div class="col-md-5">
                <x-form.input name="namalengkap" value="{!! $personil->namalengkap !!}" label="Nama Lengkap" />
            </div>
            <div class="col-md-2">
                <x-form.input name="gelarbelakang" value="{{ $personil->gelarbelakang }}" label="Gelar Belakang" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-form.select name="jeniskelamin" :options="['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']"
                    value="{{ old('Laki-laki', $personil->jeniskelamin) }}" label="Jenis Kelamin" />
            </div>
            <div class="col-md-6">
                <x-form.select name="jenispersonil" :options="[
                    'Kepala Sekolah' => 'Kepala Sekolah',
                    'Guru' => 'Guru',
                    'Tata Usaha' => 'Tata Usaha',
                ]"
                    value="{{ old('Guru', $personil->jenispersonil) }}" label="Jenis Personil" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-form.input name="tempatlahir" value="{{ $personil->tempatlahir }}" label="Tempat Lahir" />
            </div>
            <div class="col-md-6">
                <x-form.input type="date" name="tanggallahir" value="{{ $personil->tanggallahir }}"
                    label="Tanggal Lahir" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-form.select name="agama" :options="$agamaOptions" :value="$personil->agama" label="Agama" />

                <x-form.input type="email" name="kontak_email" value="{{ $personil->kontak_email }}" label="Email" />


            </div>
            <div class="col-md-6">
                <x-form.select name="aktif" :options="[
                    'Aktif' => 'Aktif',
                    'Tidak Aktif' => 'Tidak Aktif',
                    'Pensiun' => 'Pensiun',
                    'Pindah' => 'Pindah',
                    'Keluar' => 'Keluar',
                ]" value="{{ old('Aktif', $personil->aktif) }}"
                    label="Status Personil" />
                <x-form.input name="kontak_hp" value="{{ $personil->kontak_hp }}" label="Nomor HP" />
                {{-- <div class="row">
                    <div class="col-md-7">
                        <x-form.input name="photo" type="file" label="Photo" onchange="previewImage(event)" />
                    </div>
                    <div class="col-md-5">
                        <img id="image-preview"
                            src="{{ $personil->photo && file_exists(public_path('images/personil/' . $personil->photo)) ? asset('images/personil/' . $personil->photo) : asset('build/images/users/user-dummy-img.jpg') }}"
                            width="150" alt="Photo" />
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <x-form.input name="alamat_blok" value="{{ $personil->alamat_blok }}" label="Alamat Blok" />
            </div>
            <div class="col-md-2">
                <x-form.input name="alamat_nomor" value="{{ $personil->alamat_nomor }}" label="Alamat Nomor" />
            </div>
            <div class="col-md-3">
                <x-form.input name="alamat_rt" value="{{ $personil->alamat_rt }}" label="RT" />
            </div>
            <div class="col-md-3">
                <x-form.input name="alamat_rw" value="{{ $personil->alamat_rw }}" label="RW" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-form.input name="alamat_desa" value="{{ $personil->alamat_desa }}" label="Desa" />
            </div>
            <div class="col-md-6">
                <x-form.input name="alamat_kec" value="{{ $personil->alamat_kec }}" label="Kecamatan" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-form.input name="alamat_kab" value="{{ $personil->alamat_kab }}" label="Kabupaten" />
            </div>
            <div class="col-md-6">
                <x-form.input name="alamat_prov" value="{{ $personil->alamat_prov }}" label="Provinsi" />
            </div>
            <div class="col-md-6">
                <x-form.input name="alamat_kodepos" value="{{ $personil->alamat_kodepos }}" label="Kode Pos" />
            </div>
        </div>
        {{--  <div class="row">
            <div class="col-md-12">
                <x-form.input type="file" name="bg_profil" label="Background Profil" />
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <x-form.input name="motto_hidup" value="{{ $personil->motto_hidup }}" label="Motto Hidup" />
            </div>
        </div>

        <div class="col-lg-12">
            <div class="gap-2 hstack justify-content-end">
                <button type="submit" class="btn btn-primary">Updates</button>
                {{-- <button type="button" class="btn btn-soft-success">Cancel</button> --}}
            </div>
        </div>
    </form>
    @if (session('success'))
        <div id="session-message" data-message="{{ session('success') }}"></div>
    @endif
</div>
{{-- <script>
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
</script> --}}
