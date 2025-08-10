<x-form.modal size="sm" title="{{ __('translation.role') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="name" value="{{ $data->name }}" label="Name" />
            <x-form.input name="guard_name" value="{{ $data->guard_name }}" label="Guard Name" />
        </div>
    </div>
</x-form.modal>
