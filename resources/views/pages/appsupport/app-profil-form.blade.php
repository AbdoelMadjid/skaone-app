<x-form.modal title="{{ __('translation.app-profil') }}" action="{{ $action ?? null }}" enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="app_nama" :value="old('app_nama', $data->app_nama)" label="App Name" />
            <x-form.textarea name="app_deskripsi" :value="old('app_deskripsi', $data->app_deskripsi)" label="App Description" />
            <x-form.input name="app_tahun" type="number" :value="old('app_tahun', $data->app_tahun)" label="Year" />
            <x-form.input name="app_pengembang" :value="old('app_pengembang', $data->app_pengembang)" label="Developer" />
        </div>
        <div class="col-md-6">
            <x-form.input name="app_icon" type="file" label="Icon" />
            @if ($data->app_icon && file_exists(public_path('build/images/' . $data->app_icon)))
                <img src="{{ asset('build/images/' . $data->app_icon) }}" width="50" alt="Icon Aplikasi" />
            @elseif ($data->app_icon && file_exists(public_path('images/' . $data->app_icon)))
                <img src="{{ asset('images/' . $data->app_icon) }}" width="50" alt="Icon Aplikasi" />
            @else
                <img src="{{ asset('build/images/users/user-dummy-img.jpg') }}" width="100" alt="Default Icon" />
            @endif
            <br><br>
            <x-form.input name="app_logo" type="file" label="Logo" />
            @if ($data->app_logo && file_exists(public_path('build/images/' . $data->app_logo)))
                <img src="{{ asset('build/images/' . $data->app_logo) }}" alt="Logo Aplikasi" />
            @elseif ($data->app_logo && file_exists(public_path('images/' . $data->app_logo)))
                <img src="{{ asset('images/' . $data->app_logo) }}" alt="Logo Aplikasi" />
            @else
                <img src="{{ asset('build/images/users/user-dummy-img.jpg') }}" width="100" alt="Default Logo" />
            @endif
        </div>
    </div>
</x-form.modal>
