<x-form.modal size="sm" title="Polling" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="title" value="{{ $data->title }}" label="Judul" />
            <div class="mb-3">
                <label for="start_time" class="form-label">Waktu Mulai</label>
                <input type="datetime-local" class="form-control" name="start_time"
                    value="{{ \Carbon\Carbon::parse($data->start_time)->format('Y-m-d\TH:i') }}" id="start_time">
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">Waktu Selesai</label>
                <input type="datetime-local" class="form-control" name="end_time"
                    value="{{ \Carbon\Carbon::parse($data->end_time)->format('Y-m-d\TH:i') }}" id="end_time">
            </div>
        </div>
    </div>
</x-form.modal>
