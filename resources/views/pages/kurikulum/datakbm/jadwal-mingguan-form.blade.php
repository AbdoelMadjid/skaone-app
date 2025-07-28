<x-form.modal size="lg" title="{{ __('translation.jadwal-mingguan') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
            id="tahunajaran" />

        <x-form.select name="semester" label="Semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
            value="{{ old('semester', $data->semester) }}" />

        <x-form.select name="id_personil" label="Personil Sekolah" :options="$personilSekolah"
            value="{{ old('id_personil', $data->id_personil) }}" />
    </div>

    <div class="row">
        <x-form.select name="kode_rombel" label="Rombongan Belajar" :options="$rombonganBelajar"
            value="{{ old('kode_rombel', $data->kode_rombel) }}" />

        <x-form.select name="hari" label="Hari" :options="[
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
        ]" value="$data->hari" />
    </div>

    <div class="row">
        <div class="mb-3">
            <label class="form-label">Jam Ke</label>
            <div class="row">
                @for ($i = 1; $i <= 12; $i++)
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="jam_ke[]"
                                id="jam_ke_{{ $i }}" value="{{ $i }}"
                                {{ in_array($i, old('jam_ke', $data->jam_ke ?? [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="jam_ke_{{ $i }}">Jam
                                {{ $i }}</label>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <x-form.input name="waktu_mulai" type="time" label="Waktu Mulai" value="{{ $data->waktu_mulai }}" />

        <x-form.input name="waktu_selesai" type="time" label="Waktu Selesai" value="{{ $data->waktu_selesai }}" />
    </div>

    <div class="row">
        <x-form.input name="mata_pelajaran" label="Mata Pelajaran" value="{{ $data->mata_pelajaran }}" />
    </div>
</x-form.modal>
