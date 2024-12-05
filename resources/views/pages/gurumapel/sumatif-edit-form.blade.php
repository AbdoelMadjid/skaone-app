<x-form.modal size="xl" title="Edit Nilai Sumatif - {{ $fullName }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <input type="hidden" name="kode_mapel_rombel" value="{{ $data->kode_mapel_rombel }}">
    <input type="hidden" name="tahunajaran" value="{{ $data->tahunajaran }}">
    <input type="hidden" name="kode_kk" value="{{ $data->kode_kk }}">
    <input type="hidden" name="tingkat" value="{{ $data->tingkat }}">
    <input type="hidden" name="ganjilgenap" value="{{ $data->ganjilgenap }}">
    <input type="hidden" name="semester" value="{{ $data->semester }}">
    <input type="hidden" name="kode_rombel" value="{{ $data->kode_rombel }}">
    <input type="hidden" name="rombel" value="{{ $data->rombel }}">
    <input type="hidden" name="kel_mapel" value="{{ $data->kel_mapel }}">
    <input type="hidden" name="kode_mapel" value="{{ $data->kode_mapel }}">
    <input type="hidden" name="mata_pelajaran" value="{{ $data->mata_pelajaran }}">
    <input type="hidden" name="kkm" id="kkm" value="{{ $data->kkm }}">
    <input type="hidden" name="id_personil" value="{{ $data->id_personil }}">
    <input type="hidden" name="jml_tp" id="jml_tp" value="{{ $jumlahTP }}">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>STS</th>
                <th>SAS</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody id="selected_siswa_tbody">
            @foreach ($pesertaDidik as $index => $siswa)
                <tr>
                    <td class="bg-primary-subtle text-center">{{ $index + 1 }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama_lengkap }}</td>
                    <td class="text-center">
                        <input type="text" class="sts-input" name="sts[{{ $siswa->nis }}]"
                            id="sts[{{ $siswa->nis }}]" value="{{ old('sts.' . $siswa->nis, $siswa->sts) }}"
                            style="width: 65px; text-align: center;" />
                    </td>
                    <td class="text-center">
                        <input type="text" class="sas-input" name="sas[{{ $siswa->nis }}]"
                            id="sas[{{ $siswa->nis }}]" value="{{ old('sas.' . $siswa->nis, $siswa->sas) }}"
                            style="width: 65px; text-align: center;" />
                    </td>
                    <td class="bg-primary-subtle text-center">
                        <input type="text" class="rerata_sumatif" name="rerata_sumatif_{{ $siswa->nis }}"
                            id="rerata_sumatif_{{ $siswa->nis }}"
                            value="{{ number_format(($siswa->sts + $siswa->sas) / 2, 0) }}" readonly
                            style="width: 75px; text-align: center;" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-form.modal>
<script>
    // Fungsi untuk memvalidasi semua input dalam modal
    function validateInputs() {
        const kkm = parseFloat(document.getElementById('kkm').value) || 0;

        // Validasi nilai KKM
        if (kkm <= 0 || isNaN(kkm)) {
            alert('Nilai KKM tidak valid!');
            return;
        }

        // Validasi untuk setiap input STS, SAS, dan Rerata Sumatif di seluruh baris
        document.querySelectorAll('.sts-input, .sas-input').forEach(function(input) {
            const nis = input.getAttribute('name').match(/\[(.*?)\]/)[1]; // Ambil NIS

            let stsInput = document.getElementById(`sts[${nis}]`);
            let sasInput = document.getElementById(`sas[${nis}]`);
            let rerataSumatifInput = document.getElementById(`rerata_sumatif_${nis}`);

            // Ambil nilai STS dan SAS
            const stsValue = parseFloat(stsInput.value) || 0;
            const sasValue = parseFloat(sasInput.value) || 0;

            // Hitung rerata sumatif
            const rerataSumatif = (stsValue + sasValue) / 2;

            // Validasi nilai STS
            if (stsValue < kkm || stsValue > 100) {
                stsInput.style.backgroundColor = 'red';
                stsInput.style.color = 'white';
            } else {
                stsInput.style.backgroundColor = '';
                stsInput.style.color = '';
            }

            // Validasi nilai SAS
            if (sasValue < kkm || sasValue > 100) {
                sasInput.style.backgroundColor = 'red';
                sasInput.style.color = 'white';
            } else {
                sasInput.style.backgroundColor = '';
                sasInput.style.color = '';
            }

            // Validasi rerata sumatif
            if (rerataSumatif < kkm || rerataSumatif > 100) {
                rerataSumatifInput.style.backgroundColor = 'red';
                rerataSumatifInput.style.color = 'white';
            } else {
                rerataSumatifInput.style.backgroundColor = '';
                rerataSumatifInput.style.color = '';
            }
        });
    }

    // Event listener untuk validasi ketika modal ditampilkan
    $('#modal_action').on('shown.bs.modal', function() {
        validateInputs(); // Pastikan validasi dijalankan setelah modal dimuat
    });

    // Pastikan validasi dijalankan setiap kali ada perubahan input
    $(document).on('input', '.sts-input, .sas-input', function(e) {
        const siswaNis = $(this).attr('name').match(/\[(.*?)\]/)[1];

        const stsInput = document.getElementById(`sts[${siswaNis}]`);
        const sasInput = document.getElementById(`sas[${siswaNis}]`);
        const kkm = parseFloat($('#kkm').val()) || 0;

        const stsValue = parseFloat(stsInput.value) || 0;
        const sasValue = parseFloat(sasInput.value) || 0;

        const rerataSumatif = (stsValue + sasValue) / 2;
        const rerataSumatifInput = document.getElementById(`rerata_sumatif_${siswaNis}`);
        rerataSumatifInput.value = rerataSumatif.toFixed(0); // Format hasil rerata sumatif

        // Validasi nilai STS
        if (stsValue < kkm || stsValue > 100) {
            stsInput.style.backgroundColor = 'red';
            stsInput.style.color = 'white';
        } else {
            stsInput.style.backgroundColor = '';
            stsInput.style.color = '';
        }

        // Validasi nilai SAS
        if (sasValue < kkm || sasValue > 100) {
            sasInput.style.backgroundColor = 'red';
            sasInput.style.color = 'white';
        } else {
            sasInput.style.backgroundColor = '';
            sasInput.style.color = '';
        }

        // Validasi rerata sumatif
        if (rerataSumatif < kkm || rerataSumatif > 100) {
            rerataSumatifInput.style.backgroundColor = 'red';
            rerataSumatifInput.style.color = 'white';
        } else {
            rerataSumatifInput.style.backgroundColor = '';
            rerataSumatifInput.style.color = '';
        }
    });
</script>
