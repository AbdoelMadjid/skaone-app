<x-form.modal title="{{ __('translation.identitas-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-3">
            <x-form.select name="tahun_ajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahun_ajaran }}"
                id="tahun_ajaran" />
        </div>
        <div class="col-sm-2">
            <x-form.select name="semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']" value="{{ old('semester', $data->semester) }}"
                label="Semester" id="semester" />
        </div>
        <div class="col-sm-4">

            <x-form.input name="nama_ujian" value="{{ $data->nama_ujian }}" label="Nama Ujian" id="nama_ujian" />
        </div>
        <div class="col-sm-3">
            <x-form.input name="kode_ujian" value="{{ $data->kode_ujian }}" label="Kode Ujian" readonly
                id="kode_ujian" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <x-form.input type="date" name="tgl_ujian_awal" value="{{ $data->tgl_ujian_awal }}"
                label="Tanggal Ujian Awal" id="tgl_ujian_awal" />
        </div>
        <div class="col-sm-4">
            <x-form.input type="date" name="tgl_ujian_akhir" value="{{ $data->tgl_ujian_akhir }}"
                label="Tanggal Ujian Akhir" id="tgl_ujian_akhir" />
        </div>
        <div class="col-sm-4">
            <x-form.input type="date" name="titimangsa_ujian" value="{{ $data->titimangsa_ujian }}"
                label="Titimangsa Ujian" id="titimangsa_ujian" />
        </div>
    </div>
    <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif']" value="{{ old('status', $data->status) }}" label="Status Ujian" />


</x-form.modal>
<script>
    function handleGenerateKodeUjian() {
        // Ambil nilai dari form
        const fullTahunAjaran = $('select[name="tahun_ajaran"]').val();
        const semester = $('select[name="semester"]').val();
        const namaUjian = $('input[name="nama_ujian"]').val();

        // Cek jika semua data tersedia
        if (!fullTahunAjaran || !semester || !namaUjian) return;

        // Ambil format 2324 dari tahun ajaran 2023-2024
        const tahunAjaran = fullTahunAjaran.substring(2, 4) + fullTahunAjaran.substring(7, 9);

        // Buat akronim dari nama ujian
        const akronim = namaUjian
            .split(' ')
            .map(word => word.charAt(0).toUpperCase())
            .join('');

        // Gabungkan menjadi kode ujian
        const kodeUjian = `${akronim}-${tahunAjaran}-${semester}`;
        $('input[name="kode_ujian"]').val(kodeUjian);
    }

    function handleUjianSelectChange() {
        // Bind event ke semua input yang mempengaruhi kode ujian
        $('select[name="tahun_ajaran"], select[name="semester"], input[name="nama_ujian"]').on('change input',
            function() {
                handleGenerateKodeUjian();
            });
    }

    $(document).ready(function() {
        handleUjianSelectChange();
    });
</script>
