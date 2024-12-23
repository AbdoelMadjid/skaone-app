<x-form.modal size="lg" title="{{ __('translation.pesan-prakerin') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <input type="hidden" name="sender_id" value="{{ Auth::user()->personal_id }}">
    <x-form.select name="receiver_id" label="Pilih Penerima" :options="$siswaterbimbingOptions" value="{{ $data->receiver_id }}"
        id="receiver_id" />

    <div class="form-group">
        <label for="message">Isi Pesan</label>
        <textarea name="message" id="message" class="form-control" rows="5"></textarea>
    </div>
    <input type="hidden" name="read_status" value="BELUM">
</x-form.modal>
