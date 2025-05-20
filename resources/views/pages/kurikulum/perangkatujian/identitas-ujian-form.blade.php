<x-form.modal title="{{ __('translation.identitas-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="tahun_ajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahun_ajaran }}"
                id="tahun_ajaran" />
            <x-form.select name="semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']" value="{{ old('semester', $data->semester) }}"
                label="Semester" id="semester" />
            <x-form.input name="nama_ujian" value="{{ $data->nama_ujian }}" label="Nama Ujian" id="nama_ujian" />
            <x-form.input name="kode_ujian" value="{{ $data->kode_ujian }}" label="Kode Ujian" readonly
                id="kode_ujian" />
            <x-form.input type="date" name="tgl_ujian_awal" value="{{ $data->tgl_ujian_awal }}"
                label="Tanggal Ujian Awal" id="tgl_ujian_awal" />
            <x-form.input type="date" name="tgl_ujian_akhir" value="{{ $data->tgl_ujian_akhir }}"
                label="Tanggal Ujian Akhir" id="tgl_ujian_akhir" />
            <x-form.input type="date" name="titimangsa_ujian" value="{{ $data->titimangsa_ujian }}"
                label="Titimangsa Ujian" id="titimangsa_ujian" />
        </div>
</x-form.modal>
<script>
    function handleGenerateKodeUjian() {
        // Ambil nilai dari form
        const tahunAjaran = $('select[name="tahun_ajaran"]').val();
        const semester = $('select[name="semester"]').val();
        const namaUjian = $('input[name="nama_ujian"]').val();

        // Cek jika semua data tersedia
        if (!tahunAjaran || !semester || !namaUjian) return;

        // Buat akronim dari nama ujian
        const akronim = namaUjian
            .split(' ')
            .map(word => word.charAt(0).toUpperCase())
            .join('');

        // Gabungkan menjadi kode ujian
        const kodeUjian = `${akronim}${tahunAjaran}${semester}`;
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
