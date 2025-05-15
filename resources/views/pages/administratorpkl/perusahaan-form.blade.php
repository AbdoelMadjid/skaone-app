<x-form.modal size="lg" title="{{ __('translation.perusahaan') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="nama" value="{{ $data->nama }}" label="Nama Perusahaan" />
            <x-form.input name="alamat" value="{{ $data->alamat }}" label="Alamat Perusahaan" />
            <x-form.input name="jabatan" value="{{ $data->jabatan }}" label="Jabatan Pembimbing" />
            <x-form.input name="nama_pembimbing" value="{{ $data->nama_pembimbing }}" label="Nama Pembimbing" />
        </div>
</x-form.modal>
