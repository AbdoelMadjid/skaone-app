<x-form.modal size="sm" title="{{ __('translation.wakil-kepala-sekolah') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="jabatan" :options="$jabatanWakasek" value="{{ old('jabatan', $data->jabatan) }}" label="Jabatan" />
            <x-form.select name="namalengkap" :options="$namaWakasek" value="{{ old('namalengkap', $data->namalengkap) }}"
                id="namalengkapguru" label="Nama Lengkap" />
            <x-form.select name="mulai_tahun" :options="$tampilTahun" value="{{ old('mulai_tahun', $data->mulai_tahun) }}"
                label="Mulai Tahun" />

            <div class="form-group mb-2">
                <label for="akhir_tahun">Selesai Tahun / Masih Aktif</label>
                <select id="jenis_select" name="akhir_tahun" class="form-control">
                    <option value="">{{ __('Pilih Tahun / Masih Aktif') }}</option>
                    @foreach ($tampilTahun as $akhir_tahun)
                        <option value="{{ $akhir_tahun }}" {{ $data->akhir_tahun == $akhir_tahun ? 'selected' : '' }}>
                            {{ $akhir_tahun }}</option>
                    @endforeach
                    <option value="Masih Aktif" {{ $data->akhir_tahun == 'Masih Aktif' ? 'selected' : '' }}>Masih Aktif
                    </option>
                </select>
            </div>
        </div>
    </div>
</x-form.modal>
<script>
    $('#modal_action').on('shown.bs.modal', function() {
        $('#namalengkapguru').select2({
            dropdownParent: $('#modal_action'),
            width: '100%', // atau 'resolve'
        });
    });
</script>
