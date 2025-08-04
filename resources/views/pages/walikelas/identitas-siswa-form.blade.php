<x-form.modal size="lg" title="{{ __('translation.identitas-siswa') }}" action="{{ $action ?? null }}" scrollable>
    @if ($data->id)
        @method('put')
    @endif
    <h5 class="text-danger">Biodata Inti</h5>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <x-form.input name="nis" value="{{ $data->nis }}" label="NIS" />
        </div>
        <div class="col-md-3">
            <x-form.input name="nisn" value="{{ $data->nisn }}" label="NISN" />
        </div>
        <div class="col-md-3">
            <x-form.select name="thnajaran_masuk" :options="$tahunAjaran"
                value="{{ old('thnajaran_masuk', $data->thnajaran_masuk) }}" label="Masuk Tahun Ajaran" />
        </div>
        <div class="col-md-3">
            <x-form.select name="kode_kk" :options="$kompetensiKeahlian" value="{{ old('kode_kk', $data->kode_kk) }}"
                label="Kompetensi Keahlian" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="nama_lengkap" value="{!! $data->nama_lengkap !!}" label="Nama Lengkap" />
        </div>
        <div class="col-md-3">
            <x-form.input name="tempat_lahir" value="{{ $data->tempat_lahir }}" label="Tempat Lahir" />
        </div>
        <div class="col-md-3">
            <x-form.input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}"
                label="Tanggal Lahir" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <x-form.select name="jenis_kelamin" :options="['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']"
                value="{{ old('jenis_kelamin', $data->jenis_kelamin) }}" label="Jenis Kelamin" />
        </div>
        <div class="col-md-3">
            <x-form.select name="agama" :options="$agamaOptions" value="{{ old('agama', $data->agama) }}" label="Agama" />
        </div>
        <div class="col-md-4">
            <x-form.select name="status_dalam_kel" :options="['Anak Kandung' => 'Anak Kandung', 'Anak Angkat' => 'Anak Angkat', 'Anak Tiri' => 'Anak Tiri']"
                value="{{ old('status_dalam_kel', $data->status_dalam_kel) }}" label="Status dalam Keluarga" />
        </div>
        <div class="col-md-2">
            <x-form.input name="anak_ke" value="{{ $data->anak_ke }}" label="Anak Ke" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-form.input name="sekolah_asal" value="{{ $data->sekolah_asal }}" label="Sekolah Asal" />
        </div>
        <div class="col-md-3">
            <x-form.select name="diterima_kelas" :options="['10' => '10', '11' => '11', '12' => '12']"
                value="{{ old('diterima_kelas', $data->diterima_kelas) }}" label="Diterima Kelas" />
        </div>
        <div class="col-md-3">
            <x-form.input type="date" name="diterima_tanggal" value="{{ $data->diterima_tanggal }}"
                label="Tanggal Diterima" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.select name="asalsiswa" :options="['Siswa Baru' => 'Siswa Baru', 'Pindahan' => 'Pindahan']" value="{{ old('asalsiswa', $data->asalsiswa) }}"
                label="Asal Siswa" />
        </div>
        <div class="col-md-8">
            <x-form.input name="keterangan_pindah" value="{{ $data->keterangan_pindah }}" label="Keterangan Pindah" />
        </div>
    </div>
    <br>
    <h5 class="text-danger">Alamat Siswa </h5>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="alamat_blok" value="{{ $data->alamat_blok }}" label="Alamat Blok" />
        </div>
        <div class="col-md-2">
            <x-form.input name="alamat_norumah" value="{{ $data->alamat_norumah }}" label="No Rumah" />
        </div>
        <div class="col-md-2">
            <x-form.input name="alamat_rt" value="{{ $data->alamat_rt }}" label="RT" />
        </div>
        <div class="col-md-2">
            <x-form.input name="alamat_rw" value="{{ $data->alamat_rw }}" label="RW" />
        </div>
        <div class="col-md-2">
            <x-form.input name="alamat_kodepos" value="{{ $data->alamat_kodepos }}" label="Kode Pos" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="alamat_desa" value="{{ $data->alamat_desa }}" label="Desa" />
        </div>
        <div class="col-md-4">
            <x-form.input name="alamat_kec" value="{{ $data->alamat_kec }}" label="Kecamatan" />
        </div>
        <div class="col-md-4">
            <x-form.input name="alamat_kab" value="{{ $data->alamat_kab }}" label="Kabupaten/Kota" />
        </div>
    </div>
    <br>
    <h5 class="text-danger">Kontak Siswa </h5>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="kontak_telepon" value="{{ $data->kontak_telepon }}" label="Telepon" />
        </div>
        <div class="col-md-6">
            <x-form.input type="email" name="kontak_email" value="{{ $data->kontak_email }}" label="Email" />
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-6">
            <h5 class='text-danger'>Status Siswa </h5>
            <hr>
            <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Lulus' => 'Lulus', 'Pindah' => 'Pindah', 'Keluar' => 'Keluar']" value="{{ old('status', $data->status) }}"
                label="Status" />
            <x-form.input name="alasan_status" value="{{ $data->alasan_status }}" label="Alasan Status" />
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <x-form.input type="file" name="foto" label="Foto" onchange="previewImage(event)" />
            </div>
            <div class="col-md-6">
                <img id="image-preview"
                    src="{{ $data->foto && file_exists(base_path('images/peserta_didik/' . $data->foto)) ? asset('images/peserta_didik/' . $data->foto) : asset('build/images/users/user-dummy-img.jpg') }}"
                    width="150" alt="Photo" />
            </div>
        </div>

    </div>
    <br>
    <h5 class="text-danger">Data Orang Tua</h5>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="status_ortu" :options="$statusOrtuOptions" value="{{ old('status_ortu', $ortu->status_ortu) }}"
                label="Status Orang Tua" />
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="nm_ayah" value="{{ $ortu->nm_ayah ?? '' }}" label="Nama Ayah" />
        </div>
        <div class="col-md-6">
            <x-form.input name="nm_ibu" value="{{ $ortu->nm_ibu ?? '' }}" label="Nama Ibu" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="pekerjaan_ayah" :options="$pekerjaanOrtu"
                value="{{ old('pekerjaan_ayah', $ortu->pekerjaan_ayah) }}" label="Pekerjaan Ayah" />
            {{-- <x-form.input name="pekerjaan_ayah" value="{{ $ortu->pekerjaan_ayah ?? '' }}" label="Pekerjaan Ayah" /> --}}
        </div>
        <div class="col-md-6">
            <x-form.select name="pekerjaan_ibu" :options="$pekerjaanOrtu"
                value="{{ old('pekerjaan_ibu', $ortu->pekerjaan_ibu) }}" label="Pekerjaan Ibu" />

            {{-- <x-form.input name="pekerjaan_ibu" value="{{ $ortu->pekerjaan_ibu ?? '' }}" label="Pekerjaan Ibu" /> --}}
        </div>
    </div>
    <div class="form-check mb-2 mt-2">
        <input class="form-check-input" type="checkbox" id="copyAlamat" onchange="copyAlamatSiswa()">
        <label class="form-check-label text-info" for="copyAlamat">
            Samakan alamat orang tua dengan alamat siswa
        </label>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="ortu_alamat_blok" value="{{ $ortu->ortu_alamat_blok ?? '' }}" label="Alamat Blok" />
        </div>
        <div class="col-md-2">
            <x-form.input name="ortu_alamat_norumah" value="{{ $ortu->ortu_alamat_norumah ?? '' }}"
                label="No Rumah" />
        </div>
        <div class="col-md-2">
            <x-form.input name="ortu_alamat_rt" value="{{ $ortu->ortu_alamat_rt ?? '' }}" label="RT" />
        </div>
        <div class="col-md-2">
            <x-form.input name="ortu_alamat_rw" value="{{ $ortu->ortu_alamat_rw ?? '' }}" label="RW" />
        </div>
        <div class="col-md-2">
            <x-form.input name="ortu_alamat_kodepos" value="{{ $ortu->ortu_alamat_kodepos ?? '' }}"
                label="Kode Pos" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="ortu_alamat_desa" value="{{ $ortu->ortu_alamat_desa ?? '' }}" label="Desa" />
        </div>
        <div class="col-md-4">
            <x-form.input name="ortu_alamat_kec" value="{{ $ortu->ortu_alamat_kec ?? '' }}" label="Kecamatan" />
        </div>
        <div class="col-md-4">
            <x-form.input name="ortu_alamat_kab" value="{{ $ortu->ortu_alamat_kab ?? '' }}"
                label="Kabupaten/Kota" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="ortu_kontak_telepon" value="{{ $ortu->ortu_kontak_telepon ?? '' }}"
                label="Telepon Orang Tua" />
        </div>
        <div class="col-md-6">
            <x-form.input type="email" name="ortu_kontak_email" value="{{ $ortu->ortu_kontak_email ?? '' }}"
                label="Email Orang Tua" />
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
<script>
    function copyAlamatSiswa() {
        const isChecked = document.getElementById('copyAlamat').checked;

        if (isChecked) {
            // Ambil nilai dari input alamat siswa
            const siswaFields = {
                blok: document.querySelector('[name="alamat_blok"]').value,
                norumah: document.querySelector('[name="alamat_norumah"]').value,
                rt: document.querySelector('[name="alamat_rt"]').value,
                rw: document.querySelector('[name="alamat_rw"]').value,
                kodepos: document.querySelector('[name="alamat_kodepos"]').value,
                desa: document.querySelector('[name="alamat_desa"]').value,
                kec: document.querySelector('[name="alamat_kec"]').value,
                kab: document.querySelector('[name="alamat_kab"]').value,
            };

            // Set nilai ke input alamat ortu
            document.querySelector('[name="ortu_alamat_blok"]').value = siswaFields.blok;
            document.querySelector('[name="ortu_alamat_norumah"]').value = siswaFields.norumah;
            document.querySelector('[name="ortu_alamat_rt"]').value = siswaFields.rt;
            document.querySelector('[name="ortu_alamat_rw"]').value = siswaFields.rw;
            document.querySelector('[name="ortu_alamat_kodepos"]').value = siswaFields.kodepos;
            document.querySelector('[name="ortu_alamat_desa"]').value = siswaFields.desa;
            document.querySelector('[name="ortu_alamat_kec"]').value = siswaFields.kec;
            document.querySelector('[name="ortu_alamat_kab"]').value = siswaFields.kab;
        } else {
            // Kosongkan jika uncheck (opsional)
            document.querySelector('[name="ortu_alamat_blok"]').value = '';
            document.querySelector('[name="ortu_alamat_norumah"]').value = '';
            document.querySelector('[name="ortu_alamat_rt"]').value = '';
            document.querySelector('[name="ortu_alamat_rw"]').value = '';
            document.querySelector('[name="ortu_alamat_kodepos"]').value = '';
            document.querySelector('[name="ortu_alamat_desa"]').value = '';
            document.querySelector('[name="ortu_alamat_kec"]').value = '';
            document.querySelector('[name="ortu_alamat_kab"]').value = '';
        }
    }
</script>
