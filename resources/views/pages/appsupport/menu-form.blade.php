<x-form.modal title="{{ __('translation.menu') }}" action="{{ $action }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="name" value="{{ $data->name }}" label="Name" />
        </div>
        <div class="col-md-6">
            <x-form.input name="url" value="{{ $data->url }}" label="Url" />
        </div>
        <div class="col-md-6">
            <x-form.input name="category" value="{{ $data->category }}" label="Category" />
        </div>
        <div class="col-md-6">
            <x-form.input name="icon" value="{{ $data->icon }}" label="Icon" />
        </div>
        <div class="col-md-6">
            <x-form.input name="orders" value="{{ $data->orders }}" label="Orders" />
        </div>
        <div class="col-md-6">
            <x-form.radio inline="true"
                value="{{ $data->main_menu_id ? ($isSubSubMenu ? 'sub_sub_menu' : 'sub_menu') : 'main_menu' }}"
                name="level_menu" :options="[
                    'Main menu' => 'main_menu',
                    'Sub menu' => 'sub_menu',
                    'Sub sub menu' => 'sub_sub_menu',
                ]" label="Level menu" />
        </div>

        <div id="main_menu_wrapper" class="col-md-6 {{ !$data->main_menu_id || $isSubSubMenu ? 'd-none' : '' }}">
            <x-form.select id="main_menu" name="main_menu" value="{{ $data->main_menu_id }}"
                placeholder="Pilih main menu" :options="$mainMenus" label="Main menu" />
        </div>

        <div id="sub_menu_wrapper" class="col-md-6 {{ !$isSubSubMenu ? 'd-none' : '' }}">
            <x-form.select id="sub_menu" name="sub_menu" value="{{ $data->id_sub_menu ?? '' }}"
                placeholder="Pilih sub menu" :options="$subMenus" label="Sub menu" />
        </div>
        {{-- Permissions --}}
        {{-- @if (!$data->id || $data->main_menu_id)
            <div id="permissions_wrapper" class="col-12">
                <div class="mb-3">
                    <label class="mb-2 form-label d-block">Permissions</label>
                    @foreach (['create', 'read', 'update', 'delete'] as $item)
                        <x-form.checkbox name="permissions[]" id="{{ $item }}_permissions"
                            value="{{ $item }}" label="{{ $item }}" />
                    @endforeach
                </div>
            </div>
        @endif --}}

        @if (!$data->id || $data->main_menu_id)
            <div id="permissions_wrapper" class="col-12">
                <div class="mb-3">
                    <label class="mb-2 form-label d-block">Permissions</label>
                    @foreach (['create', 'read', 'update', 'delete'] as $item)
                        <label class="me-3">
                            <input type="checkbox" name="permissions[]" value="{{ $item }}"
                                {{ in_array($item, $menuPermissions ?? []) ? 'checked' : '' }}>
                            {{ ucfirst($item) }}
                        </label>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</x-form.modal>
