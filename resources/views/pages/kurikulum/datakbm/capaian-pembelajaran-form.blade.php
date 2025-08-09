<x-form.modal size="lg" title="{{ __('translation.capaian-pembelajaran') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="kode_cp" id="kode_cp" value="{{ old('code_cp', $data->code_cp) }}" label="Kode CP"
                readonly />
        </div>
        <div class="col-md-4">
            <x-form.select name="tingkat" label="Tingkat" :options="['10' => '10', '11' => '11', '12' => '12']" id="tingkat"
                value="{{ $data->tingkat }}" />
        </div>
        <div class="col-md-4">
            <x-form.select name="fase" label="fase" :options="['E' => 'E', 'F' => 'F']" id="fase" value="{{ $data->fase }}" />
        </div>

    </div>
    <div class="mb-4">
        <x-form.input name="element" id="element" value="{{ old('element', $data->element) }}" label="ELemen" />
        <x-form.select class="select2 form-select form-select-sm" id="inisial_mp" name="inisial_mp"
            label="Mata Pelajaran" :options="$inisialMP" value="{{ $data->inisial_mp }}" />
    </div>
    <div class="row">
        <div class="col-md-2">
            <x-form.select name="nomor_urut" label="Nomor Urut CP" :options="$nomorOptions" id="nomor_urut"
                value="{{ $data->nomor_urut }}" />
        </div>
        <div class="col-md-10">
            <label for="exampleFormControlTextarea5" class="form-label">Isi Capaian Pembelajaran</label>
            <textarea name="isi_cp" class="form-control" id="exampleFormControlTextarea5" rows="5">{{ $data->isi_cp }}</textarea>
        </div>
    </div>
</x-form.modal>
