<x-form.modal size="lg" title="{{ __('translation.peserta-prakerin') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaran"
                value="{{ old('status', $data->tahunajaran) }}" id="tahunajaran" />
        </div>
        <div class="col-md-6">
            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlian"
                value="{{ old('status', $data->kode_kk) }}" id="kode_kk" />
        </div>
        <div class="col-md-12">
            <x-form.select class="select2 form-select form-select-sm" id="nis" name="nis"
                label="Peserta Didik" :options="$pesertaDidikOptions" value="{{ old('status', $data->nis) }}" />
        </div>
    </div>
</x-form.modal>
