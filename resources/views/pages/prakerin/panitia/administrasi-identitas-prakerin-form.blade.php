<x-form.modal size="lg" title="{{ __('translation.administrasi-identitas-prakerin') }}"
    action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            {{-- <x-form.input name="nama" value="{{ $data->nama }}" label="Nama Perusahaan" />
            <x-form.input name="alamat" value="{{ $data->alamat }}" label="Alamat Perusahaan" />
            <x-form.select name="status" :options="['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif']" value="{{ old('status', $data->status) }}" label="Status" /> --}}
        </div>
    </div>
</x-form.modal>
