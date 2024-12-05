<x-form.modal size="xl" title="Formatif - {{ $fullName }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('post')
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
                            id="sts[{{ $siswa->nis }}]" value="" style="width: 65px; text-align: center;" />
                    </td>
                    <td class="text-center">
                        <input type="text" class="sas-input" name="sas[{{ $siswa->nis }}]"
                            id="sas[{{ $siswa->nis }}]" value="" style="width: 65px; text-align: center;" />
                    </td>
                    <td class="bg-primary-subtle text-center">
                        <input type="text" class="rerata_sumatif" name="rerata_sumatif_{{ $siswa->nis }}"
                            id="rerata_sumatif_{{ $siswa->nis }}" readonly
                            style="width: 75px; text-align: center;" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-form.modal>
<script>
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('sts-input') || e.target.classList.contains('sas-input')) {
            // Ambil NIS siswa dari atribut name input
            const siswaNis = e.target.getAttribute('name').match(/\[(.*?)\]/)[1];

            // Ambil elemen input STS dan SAS
            const stsInput = document.getElementById(`sts[${siswaNis}]`);
            const sasInput = document.getElementById(`sas[${siswaNis}]`);

            // Ambil nilai KKM dari elemen dengan ID 'kkm'
            const kkm = parseFloat(document.getElementById('kkm').value) || 0;

            // Ambil nilai STS dan SAS, jika tidak valid set ke 0
            const stsValue = parseFloat(stsInput.value) || 0;
            const sasValue = parseFloat(sasInput.value) || 0;

            // Hitung rata-rata sumatif (STS + SAS) / 2
            const rerataSumatif = (stsValue + sasValue) / 2;

            // Update kolom rerata_sumatif
            const rerataSumatifInput = document.getElementById(`rerata_sumatif_${siswaNis}`);
            rerataSumatifInput.value = rerataSumatif.toFixed(2); // Format dengan 2 desimal

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
        }
    });
</script>
