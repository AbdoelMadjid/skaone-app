<x-form.modal title="{{ __('translation.identitas-sekolah') }}" action="{{ $action ?? null }}"
    enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-4">
            <x-form.input name="npsn" :value="old('npsn', $data->npsn)" label="NPSN" />
        </div><!--end col-->
        <div class="col-sm-4">
            <x-form.input name="nama_sekolah" :value="old('nama_sekolah', $data->nama_sekolah)" label="Nama Sekolah" />
        </div><!--end col-->
        <div class="col-sm-4">
            <x-form.select name="status" :options="['Negeri' => 'Negeri', 'Swasta' => 'Swasta']" value="{{ old('status', $data->status) }}" label="Status" />
        </div><!--end col-->
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="fs-14 mb-3">Alamat Sekolah:</h5>
            <x-form.input name="alamat_jalan" :value="old('alamat_jalan', $data->alamat_jalan)" label="Jalan" />
            <x-form.input name="alamat_no" :value="old('alamat_no', $data->alamat_no)" label="Nomor" />
            <x-form.input name="alamat_blok" :value="old('alamat_blok', $data->alamat_blok)" label="Blok" />
            <x-form.input name="alamat_rt" :value="old('alamat_rt', $data->alamat_rt)" label="RT" />
            <x-form.input name="alamat_rw" :value="old('alamat_rw', $data->alamat_rw)" label="RW" />
        </div><!--end col-->
        <div class="col-sm-4">
            <h5 class="fs-14 mb-3">&nbsp;&nbsp;</h5>
            <x-form.input name="alamat_desa" :value="old('alamat_desa', $data->alamat_desa)" label="Desa" />
            <x-form.input name="alamat_kec" :value="old('alamat_kec', $data->alamat_kec)" label="Kecamatan" />
            <x-form.input name="alamat_kab" :value="old('alamat_kab', $data->alamat_kab)" label="Kabupaten" />
            <x-form.input name="alamat_provinsi" :value="old('alamat_provinsi', $data->alamat_provinsi)" label="Provinsi" />
            <x-form.input name="alamat_kodepos" :value="old('alamat_kodepos', $data->alamat_kodepos)" label="Kode Pos" />
        </div>
        <div class="col-sm-5">
            <h5 class="fs-14 mb-3">Kontak Sekolah:</h5>
            <x-form.input name="alamat_telepon" :value="old('alamat_telepon', $data->alamat_telepon)" label="Telepon" />
            <x-form.input name="alamat_website" :value="old('alamat_website', $data->alamat_website)" label="Website" />
            <x-form.input name="alamat_email" :value="old('alamat_email', $data->alamat_email)" label="Email" />
            <x-form.input name="logo_sekolah" type="file" label="Logo Sekolah" />
            <h5 class="fs-14 mb-3">Gambar Logo:</h5>
            @if ($data->logo_sekolah && file_exists(base_path('build/images/' . $data->logo_sekolah)))
                <img src="{{ asset('build/images/' . $data->logo_sekolah) }}" width="100" alt="Logo Sekolah" />
            @elseif ($data->logo_sekolah && file_exists(base_path('images/' . $data->logo_sekolah)))
                <img src="{{ asset('images/' . $data->logo_sekolah) }}" width="100" alt="Logo Sekolah" />
            @else
                <img src="{{ asset('build/images/users/user-dummy-img.jpg') }}" width="100" alt="Default Photo" />
            @endif
        </div>
    </div>
</x-form.modal>
