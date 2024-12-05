<x-form.modal size="lg" title="{{ __('translation.penempatan-prakerin') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="kode_modulajar" label="Kode Modul Ajar" value="{{ $data->kode_modulajar }}"
                id="kode_modulajar" />
        </div>
        <div class="col-md-4">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahunajaran" />
        </div>
        <div class="col-md-4">
            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions" value="{{ $data->kode_kk }}"
                id="kode_kk" />
        </div>
        <div class="col-md-12">
            <x-form.select name="kode_cp" label="Element CP" :options="$elemenCPOptions" value="{{ $data->kode_cp }}"
                id="kode_cp" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <x-form.select name="nomor_tp" label="Nomor Urut TP" :options="$nomorOptions" id="nomor_tp"
                value="{{ $data->nomor_tp }}" />
        </div>
        <div class="col-md-10">
            <label for="exampleFormControlTextarea5" class="form-label">Isi Capaian Pembelajaran</label>
            <textarea name="isi_tp" class="form-control" id="exampleFormControlTextarea5" rows="5">{{ $data->isi_tp }}</textarea>
        </div>
    </div>
</x-form.modal>
