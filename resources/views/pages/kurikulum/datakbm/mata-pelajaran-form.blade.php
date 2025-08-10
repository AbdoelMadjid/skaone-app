<x-form.modal size="lg" title="{{ __('translation.mata-pelajaran') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <!-- Kompetensi Keahlian Select -->
    <div class="row">
        <div class="col-md-3">
            <!-- Kelompok Select -->
            <x-form.select name="kelompok" :options="[
                'A' => 'A',
                'B1' => 'B1',
                'B2' => 'B2',
                'B3' => 'B3',
                'B4' => 'B4',
                'B5' => 'B5',
                'PKL' => 'PKL',
                'BK' => 'BK',
            ]" value="{{ old('kelompok', $data->kelompok) }}"
                label="Kelompok" id="kelompok" />
        </div>
        <div class="col-md-3">
            <!-- Kelompok Select -->
            <x-form.select name="kode" :options="$kodeMapel" value="{{ old('kode', $data->kode) }}" label="Kode"
                id="kode" />
        </div>
        <div class="col-md-3">
            <!-- No. Urut Mapel Select -->
            <x-form.select name="nourut" :options="$nourutOptions" value="{{ old('nourut', $data->nourut) }}"
                label="No. Urut Mapel" id="nourut" />
        </div>
        <div class="col-md-3">
            <x-form.input name="kel_mapel" value="{{ old('kel_mapel', $data->kel_mapel) }}" label="Kel. MP"
                id="kel_mapel" readonly />
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <x-form.input name="mata_pelajaran" value="{{ old('mata_pelajaran', $data->mata_pelajaran) }}"
                label="Mata Pelajaran" />
        </div>
        <div class="col-md-4">
            <x-form.input name="inisial_mp" value="{{ old('inisial_mp', $data->inisial_mp) }}" label="Inisial MP"
                id='inisial_mp' readonly />
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Semester</th>
                <th>Kompetensi Keahlian</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @for ($i = 1; $i <= 6; $i++)
                        <!-- Semester {{ $i }} Checkbox -->
                        <div class="form-check form-switch form-check-inline">
                            <!-- Hidden input to handle unchecked state -->
                            <input type="hidden" name="semester_{{ $i }}" value="0">
                            <input class="form-check-input" name="semester_{{ $i }}" type="checkbox"
                                value="1" id="semester_{{ $i }}" @checked(old("semester_$i", $data->{"semester_$i"}))>
                            <label class="form-check-label" for="semester_{{ $i }}">Semester
                                {{ $i }}</label>
                        </div><br>
                    @endfor
                </td>
                <td>
                    @foreach ($kompetensiKeahlians as $kk)
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" name="kode_kk[]" type="checkbox"
                                value="{{ $kk->idkk }}" id="idkk_{{ $kk->idkk }}"
                                @checked(in_array($kk->idkk, old('kode_kk', $selectedIdKk ?? [])))>
                            <label class="form-check-label" for="idkk_{{ $kk->idkk }}">{{ $kk->nama_kk }}</label>
                        </div>
                        <br>
                    @endforeach
                </td>
                <td>
                    B2 - DPK<br>
                    B3 - KK<br>
                    B4 - KWU<br>
                    B5 - MPP
                </td>
            </tr>
            <tr>
                <td>
                    <x-form.checkbox id="check_semester" name="check_semester" label="Check All Semester" />
                </td>
                <td>
                    <x-form.checkbox id="check_all" name="check_all" label="Check All Jurusan" />
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>

</x-form.modal>
<script>
    function handleGenerateKodeMapel() {
        // Fungsi ini akan menangani logika pengisian otomatis Rombel dan Kode Rombel
        const kelompok = $('select[name="kelompok"]').val();
        const kode = $('select[name="kode"]').val();

        // Ambil nilai nourut dan tambahkan 0 jika kurang dari 10
        let nourut = $('select[name="nourut"]').val();
        if (nourut < 10) {
            nourut = '0' + nourut; // Tambahkan 0 di depan jika nourut kurang dari 10
        }

        const kel_mapel = `${kelompok}-${nourut}-${kode}`;
        const inisialmp = `${kelompok}-${kode}-${nourut}`;

        $('#kel_mapel').val(kel_mapel); // Set nilai kel_mapel
        $('#inisial_mp').val(inisialmp); // Set nilai inisial_mp
    }

    function handleSelectChange() {
        // Triggered when any of the dropdowns change
        $('select[name="kelompok"], select[name="nourut"], select[name="kode"]')
            .on('change', function() {
                handleGenerateKodeMapel();
            });
    }

    function handleCheckboxKompetensiKeahlian() {
        // Script untuk Check All checkbox
        var checkAll = document.getElementById('check_all');
        var checkboxes = document.querySelectorAll('input[name="kode_kk[]"]');

        if (checkAll) {
            checkAll.addEventListener('change', function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = checkAll.checked;
                });
            });
        }
    }

    function handleCheckboxSemester() {
        const checkAll = document.getElementById('check_semester');
        const semesterCheckboxes = document.querySelectorAll(
            'input[name^="semester_"]'); // Mengambil semua checkbox semester

        if (checkAll) {
            checkAll.addEventListener('change', function() {
                semesterCheckboxes.forEach(function(
                    checkbox) { // Ubah nama parameter dari semesterCheckboxes ke checkbox
                    checkbox.checked = checkAll.checked;
                });
            });
        }
    }

    // Inisialisasi DataTable
    $(document).ready(function() {
        handleSelectChange();
        handleCheckboxKompetensiKeahlian();
        handleCheckboxSemester()
    });
</script>
