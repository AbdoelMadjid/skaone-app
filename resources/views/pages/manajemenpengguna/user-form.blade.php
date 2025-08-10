<x-form.modal title="{{ __('translation.users') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="name" value="{{ $data->name }}" label="Name" />
        </div>
        <div class="col-md-6">
            <x-form.input name="email" value="{{ $data->email }}" label="email" />
        </div>
        @if (request()->routeIs('manajemenpengguna.users.create'))
            <div class="col-md-6">
                <x-form.input name="password" type="password" value="{{ $data->password }}" label="password" />
            </div>
            <div class="col-md-6">
                <x-form.input name="password_confirmation" type="password" value=""
                    label="Password Confirmation" />
            </div>
        @endif
        <div class="col-md-6">
            <div class="mb-3">
                <label for="roles" class="form-label">roles</label>
                <select id="roles" name="roles[]" class="form-select" multiple>
                    @foreach ($roles as $item)
                        <option value="{{ $item }}" @selected(in_array($item, $data->roles->pluck('name')->toArray()))>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</x-form.modal>
