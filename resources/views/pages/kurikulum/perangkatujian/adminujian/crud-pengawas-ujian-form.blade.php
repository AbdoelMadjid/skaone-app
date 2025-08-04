<x-form.modal title="{{ __('translation.pengawas-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-6">
            <x-form.input name="kode_ujian" value="{{ $ujianAktif?->kode_ujian }}" label="Kode Ujian" id="kode_ujian"
                readonly />
        </div>
        <div class="col-sm-6">
            <x-form.select name="nomor_ruang" label="Nomor Ruangan" :options="['CAD' => 'Cadangan'] + $ruanganOptions" id="nomor_ruang"
                value="{{ $data->nomor_ruang }}" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <x-form.select name="tanggal_ujian" label="Tanggal Ujian" :options="$tanggalUjianOption" id="tanggal_ujian"
                value="{{ $data->tanggal_ujian }}" />
        </div>
        <div class="col-sm-2">
            <x-form.select name="jam_ke" label="Jam Ke" :options="['1' => '1', '2' => '2', '3' => '3', '4' => '4']" id="jam_ke" value="{{ $data->jam_ke }}" />
        </div>
        <div class="col-sm-6">
            <x-form.select name="kode_pengawas" label="Pengawas Ujian" :options="$pengawasOption" id="kode_pengawas"
                value="{{ $data->kode_pengawas }}" />
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
