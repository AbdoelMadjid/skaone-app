<x-form.modal title="{{ __('translation.denah-ruangan-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-3">
                    <x-form.input name="kode_ruang" value="{{ $data->kode_ruang }}" label="Kode Ruang" id="kode_ruang" />
                </div>
                <div class="col-sm-7">
                    <x-form.input name="label" value="{{ $data->label }}" label="Label Ruang" id="label" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input name="x" value="{{ $data->x }}" label="Koordinat X" id="x" />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="y" value="{{ $data->y }}" label="Koordinat Y" id="y" />
                </div>
            </div>
        </div>
</x-form.modal>
