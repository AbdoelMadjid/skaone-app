<x-form.modal size="xl" title="{{ __('translation.guru-wali') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-3">
            <x-form.select name="tahunajaran" id="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions"
                value="{{ old('tahunajaran', $tahunAjaranAktif) }}" />
        </div>
        <div class="col-md-9">
            <x-form.select class="select2 form-select form-select-sm" name="id_personil" label="Personil Sekolah"
                :options="$personilOption" value="{{ $data->id_personil }}" id="id_personil" />
        </div>
        <div class="col-md-12">
            <select multiple name="nis[]" id="multiselect-optiongroup">
                <option value="" disabled>Pilih Siswa</option>
                @foreach ($siswaGuruWaliOptions as $namaKK => $siswas)
                    <optgroup label="{{ $namaKK }}">
                        @foreach ($siswas as $nis => $label)
                            <option value="{{ $nis }}">{{ $label }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <input type="hidden" value="Aktif" name="status" id="status">

</x-form.modal>
<script>
    var multiSelectOptGroup = document.getElementById("multiselect-optiongroup");
    if (multiSelectOptGroup) {
        multi(multiSelectOptGroup, {
            enable_search: true
        });
    }
</script>
