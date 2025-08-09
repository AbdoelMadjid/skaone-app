<x-form.modal size="lg" title="{{ __('translation.penempatan-prakerin') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahunajaran" />
        </div>
        <div class="col-md-6">
            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions" value="{{ $data->kode_kk }}"
                id="kode_kk" />
        </div>
        <div class="col-md-12">
            <x-form.select class="select2 form-select form-select-sm" id="nis" name="nis"
                label="Peserta Didik" :options="$pesertaDidikOptions" value="{{ $data->nis }}" />
        </div>
        <div class="col-md-12">
            <x-form.select class="select2 form-select form-select-sm" name="id_dudi" label="Perusahaan"
                :options="$perusahaanOptions" value="{{ $data->id_dudi }}" id="dudi" />
        </div>
    </div>
</x-form.modal>
