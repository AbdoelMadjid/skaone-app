<x-form.modal title="{{ __('translation.permissions') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-8">
            <x-form.input name="name" value="{{ $data->name }}" label="Name" />
        </div>
        <div class="col-md-4">
            <x-form.input name="guard_name" value="{{ $data->guard_name }}" label="guard_name" />
        </div>
    </div>
</x-form.modal>
