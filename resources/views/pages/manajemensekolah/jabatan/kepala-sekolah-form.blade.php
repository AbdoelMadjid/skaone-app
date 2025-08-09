<x-form.modal title="{{ __('translation.kepala-sekolah') }}" action="{{ $action ?? null }}">
    @if ($data->id_personil)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="nama" value="{!! $data->nama !!}" label="Nama Lengkap" />
        </div>
        <div class="col-md-6">
            <x-form.input name="nip" value="{{ $data->nip }}" label="NIP" />
        </div>
        <div class="col-md-6">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaran" value="{{ $data->tahunajaran }}" />
        </div>
        <div class="col-md-6">
            <x-form.select name="semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']" value="{{ old('semester', $data->semester) }}"
                label="Semester" />
        </div>
    </div>
</x-form.modal>
