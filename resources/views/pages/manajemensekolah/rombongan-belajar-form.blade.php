<x-form.modal title="{{ __('translation.rombongan-belajar') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}" />
        </div>
        <div class="col-md-6">
            <x-form.select name="id_kk" label="Id Kompetensi Keahlian" :options="$kompetensiKeahlian" value="{{ $data->id_kk }}" />
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <x-form.select name="tingkat" label="Tingkat" :options="['10' => '10', '11' => '11', '12' => '12']" id="tingkat"
                        value="{{ $data->tingkat }}" />
                </div>
                <div class="col-md-4">
                    <x-form.select name="singkatan_kk" label="Singkatan KK" :options="$singkatanKK" id="singkatan_kk"
                        value="{{ $data->singkatan_kk }}" />
                </div>
                <div class="col-md-4">
                    <x-form.select name="pararel" label="Pararel" :options="$pararelOptions" id="pararel"
                        value="{{ $data->pararel }}" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <x-form.input name="rombel" value="{{ $data->rombel }}" id="rombel" label="Rombel" readonly />
        </div>
        <div class="col-md-6">
            <x-form.input name="kode_rombel" value="{{ $data->kode_rombel }}" id="kode_rombel" label="Kode Rombel"
                readonly />
        </div>
        <div class="col-md-12">
            <x-form.select name="wali_kelas" label="Wali Kelas" :options="$waliKelas" id="walikelas"
                value="{{ $data->wali_kelas }}" />
        </div>
    </div>
</x-form.modal>
<script>
    function handleGenerateRombel() {
        // Fungsi ini akan menangani logika pengisian otomatis Rombel dan Kode Rombel
        const tingkat = $('select[name="tingkat"]').val();
        const singkatanKK = $('select[name="singkatan_kk"]').val();
        const pararel = $('select[name="pararel"]').val();
        const rombel = `${tingkat} ${singkatanKK} ${pararel}`;
        $('#rombel').val(rombel); // Set nilai rombel

        const tahunajaran = $('select[name="tahunajaran"]').val().substring(0, 4); // Ambil 4 digit awal tahun ajaran
        const idKK = $('select[name="id_kk"]').val();
        const kodeRombel = `${tahunajaran}${idKK}${tingkat}-${tingkat}${singkatanKK}${pararel}`;
        $('#kode_rombel').val(kodeRombel); // Set nilai kode_rombel
    }

    function handleSelectChange() {
        // Triggered when any of the dropdowns change
        $('select[name="tingkat"], select[name="singkatan_kk"], select[name="pararel"], select[name="tahunajaran"], select[name="id_kk"]')
            .on('change', function() {
                handleGenerateRombel();
            });
    }

    // Inisialisasi DataTable
    $(document).ready(function() {
        handleSelectChange();
    });
</script>
