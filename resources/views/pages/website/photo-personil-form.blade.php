<x-form.modal size="lg" title="{{ __('translation.photo-personil') }}" action="{{ $action ?? null }}"
    enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-4">
            <x-form.select name="no_group" label="No. Group" :options="$nomorOptions" id="no_group"
                value="{{ $data->no_group }}" />
        </div>
        <div class="col-md-8">
            <x-form.select name="nama_group" id="nama_group" :options="$groupnameOption"
                value="{{ old('nama_group', $data->nama_group) }}" label="Nama Group Personil" />
        </div>
        <div class="col-md-4">
            <x-form.select name="no_personil" label="No. Urut" :options="$nomorOptions" id="no_personil"
                value="{{ $data->no_personil }}" />
        </div>
        <div class="col-md-8">
            <x-form.select name="id_personil" id="id_personil" :options="$personilSekolah"
                value="{{ old('id_personil', $data->id_personil) }}" label="Nama Lengkap" />
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <x-form.input name="photo" id="photo" type="file" label="Upload photo personil"
                onchange="previewImage(event)" />
            <h5 class="fs-14 mb-3 mt-4">Photo Personil</h5>
            <img id="image-preview" class="border-double"
                src="{{ $data->photo && file_exists(base_path('images/photo-personil/' . $data->photo)) ? asset('images/photo-personil/' . $data->photo) : asset('images/welcome/personil/img1.jpg') }}"
                width="150" alt="Photo" />
        </div>
        <div class="col-md-4"></div>
    </div>
</x-form.modal>
<script>
    $('#modal_action').on('shown.bs.modal', function() {
        $('#id_personil').select2({
            dropdownParent: $('#modal_action'),
            width: '100%',
        });
    });

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
            preview.src = '{{ asset('build/images/bg-auth.jpg') }}'; // Reset to default if no file is selected
        }
    }
</script>
