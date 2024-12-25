<x-form.modal size="sm" title="{{ __('translation.daily-messages') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input type="date" name="date" value="{{ $data->date }}" label="Date" />
            <label for="messages" class="form-label">Messages</label>
            <textarea name="message" class="form-control" id="messages" rows="5">{{ $data->message }}</textarea>
        </div>
    </div>
</x-form.modal>
