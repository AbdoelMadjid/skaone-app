<x-form.modal size="lg" title="{{ __('translation.pesan-prakerin') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <input type="hidden" name="sender_id" value="{{ Auth::user()->nis }}">
    <div class="form-group">
        <label for="receiver_id">Penerima:</label>
        <input type="text" name="receiver_id" class="form-control" id="receiver_id"
            value="{{ $pembimbingSiswa->name }}" disabled>
        <input type="hidden" name="receiver_id" value="{{ $pembimbingSiswa->id }}">
    </div>

    <div class="form-group mt-3">
        <label for="message">Isi Pesan</label>
        <textarea name="message" id="message" class="form-control" rows="5"></textarea>
    </div>

    <input type="hidden" name="read_status" value="BELUM">

    <input type="hidden" name="created_at" id="created_at">
</x-form.modal>
