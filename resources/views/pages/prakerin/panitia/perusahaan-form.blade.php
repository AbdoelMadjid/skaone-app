<x-form.modal size="lg" title="{{ __('translation.perusahaan') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="nama" value="{{ $data->nama }}" label="Nama Perusahaan" />
            <x-form.input name="alamat" value="{{ $data->alamat }}" label="Alamat Perusahaan" />
        </div>
    </div>
    <div class="row">

        <div class="col-md-2">
            <x-form.input name="id_pimpinan" value="{{ $data->id_pimpinan }}" label="ID Pimpinan"
                aria-placeholder="NIS, NIDN" />
        </div>
        <div class="col-md-6">
            <x-form.input name="jabatan_pimpinan" value="{{ $data->jabatan_pimpinan }}" label="Jabatan Pimpinan" />
        </div>
        <div class="col-md-4">
            <x-form.input name="no_ident_pimpinan" value="{{ $data->no_ident_pimpinan }}" label="No. Identitas Pimpinan"
                placeholder="isi dengan NIS, NIDN" />
        </div>
        <div class="col-md-12">
            <x-form.input name="nama_pimpinan" value="{{ $data->nama_pimpinan }}" label="Nama Lengkap Pimpinan"
                placeholder="isi beserta gelar" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <x-form.input name="id_pembimbing" value="{{ $data->id_pembimbing }}" label="ID Pimpinan"
                placeholder="NIS, NIDN" />
        </div>
        <div class="col-md-6">
            <x-form.input name="jabatan_pembimbing" value="{{ $data->jabatan_pembimbing }}" label="Jabatan Pimpinan" />
        </div>
        <div class="col-md-4">
            <x-form.input name="no_ident_pembimbing" value="{{ $data->no_ident_pembimbing }}"
                label="No. Identitas Pembimbing" placeholder="isi dengan NIS, NIDN" />
        </div>
        <div class="col-md-12">
            <x-form.input name="nama_pembimbing" value="{{ $data->nama_pembimbing }}" label="Nama Lengkap Pembimbing"
                placeholder="isi beserta gelar" />
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif']" value="{{ old('status', $data->status) }}"
                label="Status" />
        </div>
    </div>
</x-form.modal>
