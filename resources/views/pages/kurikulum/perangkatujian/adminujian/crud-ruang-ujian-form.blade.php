<x-form.modal title="{{ __('translation.ruang-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-sm-6">
            <x-form.input name="kode_ujian" value="{{ $identitasUjian?->kode_ujian }}" label="Kode Ujian" id="kode_ujian"
                readonly />
        </div>
        <div class="col-sm-6">
            <x-form.select name="nomor_ruang" label="Nomor Ruangan" :options="$ruanganOptions" id="nomor_ruang"
                value="{{ $data->nomor_ruang }}" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <x-form.select name="kelas_kiri" label="Kelas Bagian Kiri" :options="['-' => 'Kosong'] + $kelasOptions" id="kelas_kiri"
                value="{{ $data->kelas_kiri }}" />
        </div>
        <div class="col-sm-3">
            <x-form.input name="kode_kelas_kiri" value="{{ $data->kode_kelas_kiri }}" label="Kode Kelas Kiri"
                id="kode_kelas_kiri" readonly />
        </div>
        <div class="col-sm-3">
            <x-form.select name="kelas_kanan" label="Kelas Bagian Kanan" :options="['-' => 'Kosong'] + $kelasOptions" id="kelas_kanan"
                value="{{ $data->kelas_kanan }}" />
        </div>
        <div class="col-sm-3">
            <x-form.input name="kode_kelas_kanan" value="{{ $data->kode_kelas_kanan }}" label="Kode Kelas Kanan"
                id="kode_kelas_kanan" readonly />
        </div>
    </div>
</x-form.modal>
<script>
    function handleGenerateKodeKiri() {
        // Ambil nilai dari form
        const nomorruang = $('select[name="nomor_ruang"]').val();
        const kelaskiri = $('select[name="kelas_kiri"]').val();

        // Cek jika semua data tersedia
        if (!nomorruang || !kelaskiri) return;

        // Gabungkan menjadi kode ujian
        const kodeKelasKiri = `${kelaskiri}-${nomorruang}`;
        $('input[name="kode_kelas_kiri"]').val(kodeKelasKiri);
    }

    function handleKelasKiriSelectChange() {
        // Bind event ke semua input yang mempengaruhi kode ujian
        $('select[name="nomor_ruang"], select[name="kelas_kiri"]').on('change input',
            function() {
                handleGenerateKodeKiri();
            });
    }

    function handleGenerateKodeKanan() {
        // Ambil nilai dari form
        const nomorruang = $('select[name="nomor_ruang"]').val();
        const kelaskanan = $('select[name="kelas_kanan"]').val();

        // Cek jika semua data tersedia
        if (!nomorruang || !kelaskanan) return;

        // Gabungkan menjadi kode ujian
        const kodeKelasKanan = `${kelaskanan}-${nomorruang}`;
        $('input[name="kode_kelas_kanan"]').val(kodeKelasKanan);
    }

    function handleKelasKananSelectChange() {
        // Bind event ke semua input yang mempengaruhi kode ujian
        $('select[name="nomor_ruang"], select[name="kelas_kanan"]').on('change input',
            function() {
                handleGenerateKodeKanan();
            });
    }

    $(document).ready(function() {
        handleKelasKiriSelectChange();
        handleKelasKananSelectChange();
    });
</script>
