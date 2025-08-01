<x-form.modal size="lg" title="{{ __('translation.administrasi-negosiator') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-4">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahunajaran" />
        </div>
        <div class="col-sm-8">
            <x-form.select name="id_personil" :options="$personilOptions" value="{{ old('id_personil', $data->id_personil) }}"
                label="Nama Personil" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <x-form.select name="gol_ruang" :options="$jenisGolRuang" value="{{ old('gol_ruang', $data->gol_ruang) }}"
                label="Golongan Ruang" />
        </div>
        <div class="col-sm-4">
            <x-form.select name="jabatan" :options="$jenisJabatan" value="{{ old('jabatan', $data->jabatan) }}"
                label="Jabatan" />
        </div>
        <div class="col-sm-4">
            <x-form.input name="id_nego" value="{{ $data->id_nego }}" label="Identitas Negosiasi" id="id_nego" />
        </div>
    </div>
</x-form.modal>
<script>
    function handleGenerateKodeUjian() {
        // Ambil nilai dari form
        const fullTahunAjaran = $('select[name="tahunajaran"]').val();
        const idPersonil = $('select[name="id_personil"]').val();

        // Cek jika semua data tersedia
        if (!fullTahunAjaran || !idPersonil) return;

        // Ambil format 2324 dari tahun ajaran 2023-2024
        const tahunAjaran = fullTahunAjaran.substring(2, 4) + fullTahunAjaran.substring(7, 9);

        // Gabungkan menjadi kode ujian
        const kodeUjian = `${tahunAjaran}-${idPersonil}`;
        $('input[name="id_nego"]').val(kodeUjian);
    }

    function handleUjianSelectChange() {
        // Bind event ke semua input yang mempengaruhi kode ujian
        $('select[name="tahunajaran"], select[name="id_personil"]').on('change input',
            function() {
                handleGenerateKodeUjian();
            });
    }

    $(document).ready(function() {
        handleUjianSelectChange();
    });
</script>
