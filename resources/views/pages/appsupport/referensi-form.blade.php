<x-form.modal size="sm" title="{{ __('translation.referensi') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-2">
                <label for="jenis">Jenis Referensi</label>
                <select id="jenis_select" name="jenis" class="form-control" onchange="toggleJenisInput()">
                    <option value="">{{ __('Select existing or add new') }}</option>
                    @foreach ($jenisOptions as $jenis)
                        <option value="{{ $jenis }}" {{ $data->jenis == $jenis ? 'selected' : '' }}>
                            {{ $jenis }}</option>
                    @endforeach
                    <option value="new">Tambah Jenis Baru</option>
                </select>
            </div>
            <div class="form-group mb-2" id="jenis_input" style="display: none;">
                <label for="jenis_input_field">Jenis Referensi Baru</label>
                <input type="text" id="jenis_input_field" name="jenis_new" class="form-control"
                    value="{{ old('jenis_new') }}">
            </div>
            <x-form.input name="data" value="{{ $data->data }}" label="Data Referensi" />
        </div>
    </div>
</x-form.modal>
