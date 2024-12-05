@foreach ($menus as $mm)
    <tr>
        <td>{{ $mm->name }}</td>
        <td>
            @foreach ($mm->permissions as $permission)
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" name="permissions[]" @checked($data->hasPermissionTo($permission->name)) type="checkbox"
                        value="{{ $permission->name }}" id="permission-{{ $mm->id . '-' . $permission->id }}">
                    <label class="form-check-label"
                        for="permission-{{ $mm->id . '-' . $permission->id }}">{{ explode(' ', $permission->name)[0] }}</label>
                </div>
            @endforeach
        </td>
    </tr>
    @foreach ($mm->subMenus as $sm)
        <tr>
            <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <x-form.checkbox id="parent{{ $mm->id . $sm->id }}" label="{{ $sm->name }}" class="parent" />
            </td>
            <td>
                @foreach ($sm->permissions as $permission)
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input child" name="permissions[]" @checked($data->hasPermissionTo($permission->name))
                            type="checkbox" value="{{ $permission->name }}"
                            id="permission-{{ $sm->id . '-' . $permission->id }}">
                        <label class="form-check-label"
                            for="permission-{{ $sm->id . '-' . $permission->id }}">{{ explode(' ', $permission->name)[0] }}</label>
                    </div>
                @endforeach
            </td>
        </tr>
        @foreach ($sm->subMenus as $csm)
            <tr>
                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <x-form.checkbox id="parent{{ $sm->id . $csm->id }}" label="{{ $csm->name }}" class="parent" />
                </td>
                <td>
                    @foreach ($csm->permissions as $permission)
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input child" name="permissions[]" @checked($data->hasPermissionTo($permission->name))
                                type="checkbox" value="{{ $permission->name }}"
                                id="permission-{{ $csm->id . '-' . $permission->id }}">
                            <label class="form-check-label"
                                for="permission-{{ $csm->id . '-' . $permission->id }}">{{ explode(' ', $permission->name)[0] }}</label>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    @endforeach
@endforeach
