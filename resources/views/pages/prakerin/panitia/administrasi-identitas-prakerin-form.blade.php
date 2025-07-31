<x-form.modal size="lg" title="{{ __('translation.administrasi-identitas-prakerin') }}"
    action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-3">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahunajaran" />
        </div>
        <div class="col-sm-9">
            <x-form.input name="nama" value="{{ $data->nama }}" label="Nama Identitas Prakerin" id="nama" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <x-form.input type="date" name="tanggal_mulai" value="{{ $data->tanggal_mulai }}"
                label="Tanggal Mulai Prakerin" id="tanggal_mulai" />
        </div>
        <div class="col-sm-4">
            <x-form.input type="date" name="tanggal_selesai" value="{{ $data->tanggal_selesai }}"
                label="Tanggal Selesai Prakerin" id="tanggal_selesai" />
        </div>
        <div class="col-sm-4">
            <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif']" value="{{ old('status', $data->status) }}"
                label="Status Kegiatan" />
        </div>
    </div>
</x-form.modal>
