<x-form.modal title="{{ __('translation.team-pengembang') }}" action="{{ $action ?? null }}" enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-md-12">
            <x-form.input name="namalengkap" value="{{ $data->namalengkap }}" label="Nama Lengkap" />
        </div>
        <div class="col-md-6">
            <x-form.select name="jeniskelamin" :options="['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']" value="{{ old('jeniskelamin', $data->jeniskelamin) }}"
                label="Jenis Kelamin" />
        </div>
        <div class="col-md-6">
            <x-form.select name="jabatan" :options="$jabatanTeam" value="{{ old('jabatan', $data->jabatan) }}"
                label="Jabatan" />
        </div>
        <div class="col-md-6">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5">{{ $data->deskripsi }}</textarea>
        </div>
        <div class="col-md-6">
            <x-form.input name="photo" type="file" label="Photo" onchange="previewImage(event)" />
            <img id="image-preview"
                src="{{ $data->photo && file_exists(base_path('images/team/' . $data->photo)) ? asset('images/team/' . $data->photo) : asset('build/images/users/user-dummy-img.jpg') }}"
                width="150" alt="Photo" />
        </div>
    </div>
</x-form.modal>
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result; // Set the src of the img to the file's data URL
            }
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.src =
                '{{ asset('build/images/users/user-dummy-img.jpg') }}'; // Reset to default if no file is selected
        }
    }
</script>
