<x-form.modal title="{{ __('translation.akses-role') }}" action="{{ $action ?? null }}" scrollable>
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-12">
            <h5>Role: {{ $data->name }}</h5>
            <div class="mt-3 mb-3">
                <x-form.select class="copy" label="Copy dari role" placeholder="Pilih role" :options="$roles" />
                <x-form.input name="search" class="search" label="Cari menu" placeholder="Cari.." />
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="menu_permissions">
                        @include('pages.manajemenpengguna.akses-role-items')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-form.modal>
