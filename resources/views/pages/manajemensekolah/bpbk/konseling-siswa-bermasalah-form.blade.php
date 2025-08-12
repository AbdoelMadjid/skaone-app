<x-form.modal title="{{ __('translation.konseling-siswa-bermasalah') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row g-3">
        {{-- Tahun Ajaran --}}
        <div class="col-md-6">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahunajaran" />
        </div>
        {{-- Semester --}}
        <div class="col-md-6">
            <x-form.select name="semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']" value="{{ old('semester', $data->semester) }}"
                label="Semester" id="semester" />
        </div>
        {{-- Tanggal --}}
        <div class="col-md-6">
            <x-form.input type="date" name="tanggal" value="{{ $data->tanggal }}" label="Tanggal Ujian Awal"
                id="tanggal" />
        </div>
        {{-- Nama Siswa --}}
        <div class="col-md-6">
            <label class="form-label">Nama Siswa</label>
            <select name="nis" id="nis" class="form-select>
                <option value="">-- Pilih Tahun
                Ajaran Dulu --</option>
            </select>
        </div>
        {{-- Rombel --}}
        <div class="col-md-6">
            <x-form.input name="rombel" value="{{ $data->rombel }}" label="Rombel" readonly id="rombel" />
        </div>
        {{-- Jenis Kasus --}}
        <div class="col-md-6">
            <x-form.select name="jenis_kasus" label="Jenis Kasus" :options="$jenisKasus" value="{{ $data->jenis_kasus }}"
                id="jenis_kasus" />
        </div>
    </div>
</x-form.modal>

<script>
    $(document).ready(function() {

        $('#modal_action').on('shown.bs.modal', function() {
            $('#nis').select2({
                dropdownParent: $('#modal_action'),
                width: '100%',
            });
        });

        function loadSiswaByTahun(tahun, selectedNis = null) {
            $('#nis').empty().append('<option value="">-- Pilih Siswa --</option>');
            $('#rombel').val('');

            if (tahun) {
                $.ajax({
                    url: "{{ route('bpbk.konseling.getSiswaByTahun') }}",
                    type: "GET",
                    data: {
                        tahunajaran: tahun
                    },
                    success: function(res) {
                        if (res.length > 0) {
                            res.forEach(function(item) {
                                $('#nis').append(
                                    `<option value="${item.nis}" ${item.nis == selectedNis ? 'selected' : ''}>
                                    ${item.nama_lengkap}
                                </option>`
                                );
                            });
                            $('#nis').trigger('change.select2');

                            if (selectedNis) {
                                loadRombelByNis(selectedNis, tahun);
                            }
                        }
                    }
                });
            } else {
                $('#nis').trigger('change.select2');
            }
        }

        function loadRombelByNis(nis, tahun) {
            $.ajax({
                url: "{{ route('bpbk.konseling.getRombelByNis') }}",
                type: "GET",
                data: {
                    nis: nis,
                    tahunajaran: tahun
                },
                success: function(res) {
                    $('#rombel').val(res.rombel ?? '');
                }
            });
        }

        $('#tahunajaran').on('change', function() {
            loadSiswaByTahun($(this).val());
        });

        $('#nis').on('change', function() {
            let nis = $(this).val();
            let tahun = $('#tahunajaran').val();
            if (nis && tahun) {
                loadRombelByNis(nis, tahun);
            } else {
                $('#rombel').val('');
            }
        });

        // === Auto-load saat edit/show ===
        let tahunAwal = $('#tahunajaran').val();
        let nisAwal = "{{ $data->nis ?? '' }}";
        if (tahunAwal && nisAwal) {
            loadSiswaByTahun(tahunAwal, nisAwal);
        }
    });
</script>
