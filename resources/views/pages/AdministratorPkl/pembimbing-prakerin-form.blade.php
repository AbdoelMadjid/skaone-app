<x-form.modal size="xl" title="{{ __('translation.pembimbing-prakerin') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.select class="select2 form-select form-select-sm" name="id_personil" label="Personil Sekolah"
                :options="$personilOption" value="{{ $data->id_dudi }}" id="id_personil" />
        </div>
        {{--  <div class="col-md-12">
            <x-form.select multiple="multiple" class="form-select form-select-sm" id="id_penempatan"
                name="id_penempatan[]" label="Peserta Prakerin" :options="$pesertaPrakerinOptions" value="{{ $data->id_penempatan }}" />
        </div> --}}
        <select multiple="multiple" name="id_penempatan[]" id="multiselect-optiongroup">
            <option value="" disabled>Pilih Siswa</option>
            @foreach ($pesertaPrakerinOptions as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>

        {{-- <select multiple="multiple" name="id_penempatan[]" id="multiselect-optiongroup">
            @php
                // Kelompokkan data berdasarkan nama perusahaan
                $groupedOptions = collect($pesertaPrakerinOptions)->groupBy(function ($value, $key) {
                    return explode(' - ', $value)[3]; // Ambil nama perusahaan dari value
                });
            @endphp

            @foreach ($groupedOptions as $groupName => $options)
                <optgroup label="{{ $groupName }}">
                    @foreach ($options as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select> --}}

    </div>
</x-form.modal>
<script>
    var multiSelectOptGroup = document.getElementById("multiselect-optiongroup");
    if (multiSelectOptGroup) {
        multi(multiSelectOptGroup, {
            enable_search: true
        });
    }
</script>
