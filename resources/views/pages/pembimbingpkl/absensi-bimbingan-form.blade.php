<x-form.modal size="lg" title="{{ __('translation.absensi-siswa-bimbingan') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <x-form.select name="nis" label="Peserta Prakerin" :options="$siswaterbimbingOptions" value="{{ $data->nis }}" id="nis" />
    <div class="row mt-3">
        <div class="col-md-4">
            <x-form.input type="date" name="tanggal" label="Tanggal Kehadiran" value="{{ $data->tanggal }}"
                id="tanggal" />
        </div>
        <div class="col-md-8">
            <x-form.select name="status" :options="['HADIR' => 'HADIR', 'SAKIT' => 'SAKIT', 'IZIN' => 'IZIN', 'ALFA' => 'ALFA']" value="{{ old('status', $data->status) }}"
                label="STATUS KEHADIRAN" />
        </div>
    </div>
</x-form.modal>
