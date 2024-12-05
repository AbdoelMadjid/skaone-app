<x-form.modal size="lg" title="{{ __('translation.kbm-per-rombel') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="kode_mapel_rombel" value="{{ $data->kode_mapel_rombel }}" label="Kode Mapel Rombel"
                id="kode_mapel_rombel" disabled />
        </div>
        <div class="col-md-4">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahun_ajaran" disabled />
        </div>
        <div class="col-md-4">
            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions" value="{{ $data->kode_kk }}"
                id="kode_kk" disabled />
        </div>
        <div class="col-md-4">
            <x-form.select name="tingkat" :options="['10' => '10', '11' => '11', '12' => '12']" value="{{ old('tingkat', $data->tingkat) }}" label="Tingkat"
                id="tingkat" disabled />
        </div>
        <div class="col-md-4">
            <x-form.select name="ganjilgenap" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']" value="{{ old('ganjilgenap', $data->ganjilgenap) }}"
                label="Ganjil/Genap" id="gg" disabled />
        </div>
        <div class="col-md-4">
            <x-form.select name="semester" :options="$angkaSemester" value="{{ old('semester', $data->semester) }}"
                label="Semester" id="semester" disabled />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.select name="kode_rombel" :options="$rombonganBelajar" value="{{ old('kode_rombel', $data->kode_rombel) }}"
                label="Kode Rombel" id="kode_rombel" disabled />
        </div>
        <div class="col-md-4">
            <x-form.input name="rombel" value="{{ $data->rombel }}" label="Rombel" id="rombel_input" disabled />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.input name="kel_mapel" value="{{ $data->kel_mapel }}" label="Kelompok Mapel" id="kel_mapel"
                disabled />
        </div>
        <div class="col-md-4">
            <x-form.input name="kode_mapel" value="{{ $data->kode_mapel }}" label="Kode Mapel" id="kode_mapel"
                disabled />
        </div>
        <div class="col-md-4">
            <x-form.select name="kkm" :options="$angkaKKM" value="{{ old('kkm', $data->kkm) }}" label="KKM"
                id="kkm" />
        </div>
        <div class="col-md-12">
            <x-form.input name="mata_pelajaran" value="{{ $data->mata_pelajaran }}" label="Mata Pelajaran"
                id="mata_pelajaran" disabled />
        </div>
        <div class="col-md-12">
            <x-form.select name="id_personil" :options="$idPersonil" value="{{ old('id_personil', $data->id_personil) }}"
                label="Guru Pengajar" id="id_personil" />
        </div>
    </div>
</x-form.modal>
