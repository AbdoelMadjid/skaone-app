<x-form.modal size="sm" title="{{ __('translation.tahun-ajaran') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="tahunajaran" value="{{ $data->tahunajaran }}" label="Tahun Ajaran" />
            <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif']" value="{{ old('status', $data->status) }}" label="Status" />
            <x-form.select name="active_semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']" value="{{ old('active_semester') }}"
                label="Semester Aktif" />
        </div>
    </div>
</x-form.modal>
