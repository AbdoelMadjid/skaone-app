<x-form.modal size="sm" title="{{ __('translation.versi-kurikulum') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="nama" value="{{ $data->nama }}" label="Nama Kurikulum" />
            <x-form.input name="nomor" value="{{ $data->nomor }}" label="Nomor Kurikulum" />
            <x-form.input name="tentang" value="{{ $data->tentang }}" label="Tentang Kurikulum" />
        </div>
    </div>
</x-form.modal>
