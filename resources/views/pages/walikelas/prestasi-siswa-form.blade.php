<x-form.modal size="lg" title="{{ __('translation.prestasi-siswa') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-3">
            <!-- Form Fields Lainnya -->
            <div class="mb-3">
                <label for="kode_rombel" class="form-label">Kode Rombel</label>
                <input type="text" id="kode_rombel" name="kode_rombel" class="form-control" value="{{ $kode_rombel }}"
                    readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="tahunajaran" class="form-label">Tahun Ajaran</label>
                <input type="text" id="tahunajaran" name="tahunajaran" class="form-control"
                    value="{{ $tahunajaran }}" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="ganjilgenap" class="form-label">Semester (Ganjil/Genap)</label>
                <input type="text" id="ganjilgenap" name="ganjilgenap" class="form-control"
                    value="{{ $ganjilgenap }}" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="semester" class="form-label">Semester Angka</label>
                <input type="text" id="semester" name="semester" class="form-control" value="{{ $semesterAngka }}"
                    readonly>
            </div>
        </div>
        <div class="col-md-12">
            <!-- Pilih Siswa -->
            <div class="mb-3">
                <label for="siswa" class="form-label">Pilih Siswa</label>
                <select name="nis" id="siswa" class="form-select">
                    <option value="" disabled {{ !isset($existingNis) ? 'selected' : '' }}>-- Pilih Siswa --
                    </option>
                    @foreach ($siswaData as $siswa)
                        <option value="{{ $siswa->nis }}"
                            {{ isset($existingNis) && $existingNis == $siswa->nis ? 'selected' : '' }}>
                            {{ $siswa->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- <x-form.select name="nis" :options="$siswaOptions" :value="$data->nis" label="Nama Peserta Didik" /> --}}
        </div>
        <div class="col-md-4">
            <x-form.select name="jenis" :options="[
                'Intrakurikuler' => 'Intrakurikuler',
                'Ekstrakurikuler' => 'Ekstrakurikuler',
            ]" value="{{ old('jenis', $data->jenis) }}"
                label="Jenis Lomba" />
        </div>
        <div class="col-md-4">
            <x-form.select name="tingkat" :options="[
                'Nasional' => 'Nasional',
                'Provinsi' => 'Provinsi',
                'Kabupaten' => 'Kabupaten',
                'Kecamatan' => 'Kecamatan',
                'Sekolah' => 'Sekolah',
            ]" value="{{ old('tingkat', $data->tingkat) }}"
                label="Tingkat Perlombaan" />
        </div>
        <div class="col-md-4">
            <x-form.select name="juarake" :options="[
                'I' => 'I',
                'II' => 'II',
                'III' => 'III',
                'Harapan I' => 'Harapan I',
                'Harapan II' => 'Harapan II',
                'Harapan III' => 'Harapan III',
            ]" value="{{ old('juarake', $data->juarake) }}"
                label="Juara Ke-" />
        </div>
        <div class="col-md-9">
            <x-form.input name="namalomba" value="{{ $data->namalomba }}" label="Nama Perlombaan" />
        </div>
        <div class="col-md-3">
            <x-form.input type="date" name="tanggal" value="{{ $data->tanggal }}" label="Tanggal Lomba" />
        </div>
        <div class="col-md-12">
            <x-form.input name="tempat" value="{{ $data->tempat }}" label="Tempat Perlombaan" />
        </div>

    </div>
</x-form.modal>
