<x-form.modal size="sm" title="{{ __('translation.app-fitur') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="nama_fitur" value="{{ $data->nama_fitur }}" label="Nama Fitur" />
            <x-form.select name="aktif" :options="['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif']" value="{{ old('Aktif', $data->aktif) }}"
                label="Aktif/Non Aktif" />
        </div>
    </div>
</x-form.modal>
