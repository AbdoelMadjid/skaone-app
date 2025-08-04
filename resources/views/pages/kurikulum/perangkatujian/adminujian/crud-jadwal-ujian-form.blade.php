<x-form.modal {{-- size="sm" --}} title="{{ __('translation.jadwal-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-4">
            <x-form.input name="kode_ujian" value="{{ $ujianAktif?->kode_ujian }}" label="Kode Ujian" id="kode_ujian"
                readonly />
        </div>
        <div class="row">
            <div class="col-md-5">
                <x-form.select name="kode_kk" :options="$kompetensiKeahlianOption" value="{{ old('kode_kk', $data->kode_kk) }}"
                    label="Kompetensi Keahlian" id="kode_kk" />
            </div>
            <div class="col-md-3">
                <x-form.select name="tingkat" :options="['10' => '10', '11' => '11', '12' => '12']" value="{{ old('tingkat', $data->tingkat) }}"
                    label="Tingkat" id="tingkat" />
            </div>
            <div class="col-md-4">
                <x-form.select name="tanggal" :options="$tanggalUjianOption" value="{{ old('tanggal', $data->tanggal) }}"
                    label="Tanggal" id="tanggal" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <x-form.select name="jam_ke" :options="['1' => '1', '2' => '2', '3' => '3', '4' => '4']" value="{{ old('jam_ke', $data->jam_ke) }}"
                    label="Jam Ke" id="jam_ke" />
            </div>
            <div class="col-md-3">
                <x-form.input name="jam_ujian" value="{{ old('jam_ujian', $data->jam_ujian) }}" label="Waktu Ujian"
                    id="jam_ujian" readonly />
            </div>
            <div class="col-md-6">
                <x-form.select name="mata_pelajaran" :options="$mataPelajaranOptions ?? []"
                    value="{{ old('mata_pelajaran', $data->mata_pelajaran) }}" label="Mata Pelajaran"
                    id="mata_pelajaran" />
            </div>
        </div>
    </div>
</x-form.modal>

<script>
    function handleKodeKK() {
        $('#kode_kk').on('change', function() {
            let kode_kk = $(this).val();
            $.get('/kurikulum/perangkatujian/get-mapel/' + kode_kk, function(data) {
                let options = '<option value="">Pilih Mata Pelajaran</option>';
                $.each(data, function(k, v) {
                    options += `<option value="${v}">${v}</option>`;
                });
                options += `<option value="Dasar-Dasar Kejuruan">Dasar-Dasar Kejuruan</option>`;
                options += `<option value="Konsentrasi Keahlian">Konsentrasi Keahlian</option>`;
                options += `<option value="Mata Pelajaran Pilihan">Mata Pelajaran Pilihan</option>`;
                $('#mata_pelajaran').html(options).val(
                    ''); // Set kembali kosong setelah data baru masuk
            });
        });
    }

    function handleJamKe() {
        const jamUjian = {
            1: '07.30 - 08.30',
            2: '09.00 - 10.00',
            3: '10.30 - 11.30',
            4: '13.00 - 14.00'
        };

        $('#jam_ke').change(function() {
            let ke = $(this).val();
            $('#jam_ujian').val(jamUjian[ke]);
        });
    }

    // Inisialisasi DataTable
    $(document).ready(function() {
        handleKodeKK();
        handleJamKe();
    });
</script>
