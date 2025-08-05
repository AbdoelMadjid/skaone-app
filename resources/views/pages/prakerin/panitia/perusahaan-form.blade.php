<x-form.modal size="lg" title="{{ __('translation.perusahaan') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="nama" value="{{ $data->nama }}" label="Nama Perusahaan" class="form-control-sm" />
            <x-form.input name="alamat" value="{{ $data->alamat }}" label="Alamat Perusahaan" class="form-control-sm" />
            <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif']" value="{{ old('status', $data->status) }}" label="Status"
                class="form-select-sm" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h5 class="text-danger">Pimpinan</h5>
            <x-form.input name="id_pimpinan" value="{{ $data->id_pimpinan }}" label="ID Pimpinan"
                placeholder="NIP, NIDN" class="form-control-sm" />
            <x-form.input name="jabatan_pimpinan" value="{{ $data->jabatan_pimpinan }}" label="Jabatan Pimpinan"
                placeholder="contoh Kepala Dinas, Direktur" class="form-control-sm" />
            <x-form.input name="no_ident_pimpinan" value="{{ $data->no_ident_pimpinan }}" label="No. Identitas Pimpinan"
                placeholder="contoh 197611282000121002" class="form-control-sm" />
            <x-form.input name="nama_pimpinan" value="{{ $data->nama_pimpinan }}" label="Nama Lengkap Pimpinan"
                placeholder="isi beserta gelar" class="form-control-sm" />
        </div>
        <div class="col-md-6">
            <h5 class="text-danger">Pembimbing</h5>
            <x-form.input name="id_pembimbing" value="{{ $data->id_pembimbing }}" label="ID Pimpinan"
                placeholder="NIP, NIDN" class="form-control-sm" />
            <x-form.input name="jabatan_pembimbing" value="{{ $data->jabatan_pembimbing }}" label="Jabatan Pimpinan"
                placeholder="contoh Kabid, Kasi, Kepala Sub Bagian" class="form-control-sm" />
            <x-form.input name="no_ident_pembimbing" value="{{ $data->no_ident_pembimbing }}"
                label="No. Identitas Pembimbing" placeholder="contoh 197611282000121002" class="form-control-sm" />
            <x-form.input name="nama_pembimbing" value="{{ $data->nama_pembimbing }}" label="Nama Lengkap Pembimbing"
                placeholder="isi beserta gelar" class="form-control-sm" />
        </div>
    </div>
</x-form.modal>
