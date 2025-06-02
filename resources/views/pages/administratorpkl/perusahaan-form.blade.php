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
        <div class="col-md-4">
            <x-form.input name="jabatan" value="{{ $data->jabatan }}" label="Jabatan Pembimbing" />
            <x-form.input name="nama_pembimbing" value="{{ $data->nama_pembimbing }}" label="Nama Pembimbing" />
            <x-form.input name="nip" value="{{ $data->nip }}" label="NIP" />
            <x-form.input name="nidn" value="{{ $data->nidn }}" label="NIDN" />
        </div>
    </div>
</x-form.modal>
