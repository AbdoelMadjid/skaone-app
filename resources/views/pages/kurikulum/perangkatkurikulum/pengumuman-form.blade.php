<x-form.modal size="sm" title="{{ __('translation.pengumuman') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="judul" value="{{ $data->judul }}" label="Judul" />
            <label for="isi" class="form-label">Isi Pengumuman</label>
            <textarea name="isi" class="form-control" id="isi" rows="5">{{ $data->isi }}</textarea>
            <x-form.input type="date" name="tanggal" value="{{ $data->tanggal }}" label="Tanggal" />
        </div>
    </div>
</x-form.modal>
