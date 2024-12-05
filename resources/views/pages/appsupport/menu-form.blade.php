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
            <x-form.radio inline="true" value="{{ $data->main_menu_id ? 'sub_menu' : 'main_menu' }}" name="level_menu"
                :options="['Main menu' => 'main_menu', 'Sub menu' => 'sub_menu']" label="Level menu" />
        </div>
        <div id="main_menu_wrapper" class="col-md-6 {{ !$data->main_menu_id ? 'd-none' : '' }}">
            <x-form.select id="main_menu" name="main_menu" value="{{ $data->main_menu_id }}"
                placeholder="Pilih main menu" :options="$mainMenus" label="Main menu" />
        </div>
        @if (!$data->id)
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="mb-2 form-label d-block">Permissions</label>
                    @foreach (['create', 'read', 'update', 'delete'] as $item)
                        <x-form.checkbox name="permissions[]" id="{{ $item }}_permissions"
                            value="{{ $item }}" label="{{ $item }}" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-form.modal>
