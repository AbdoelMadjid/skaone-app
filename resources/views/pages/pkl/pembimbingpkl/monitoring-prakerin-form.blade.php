<x-form.modal size="lg" title="{{ __('translation.monitoring-pkl') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <input type="hidden" name="id_personil" value="{{ Auth::user()->personal_id }}">
    <x-form.select name="id_perusahaan" label="Perusahaan" :options="$listPerusahaan" value="{{ $data->id_perusahaan }}"
        id="id_perusahaan" />

    <div class="row mt-3">
        <div class="col-md-4">
            <x-form.input type="date" name="tgl_monitoring" label="Tgl Monitoring"
                value="{{ $data->tgl_monitoring }}" id="tgl_monitoring" />
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="catatan_monitoring">Catatan Monitoring</label>
                <textarea name="catatan_monitoring" id="catatan_monitoring" class="form-control" rows="5">
                    {{ $data->catatan_monitoring }}
                </textarea>
            </div>
        </div>
    </div>
</x-form.modal>
