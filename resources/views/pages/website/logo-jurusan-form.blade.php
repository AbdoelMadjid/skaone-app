<x-form.modal size="md" title="Logo Jurusan" action="{{ $action ?? null }}" enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="kode_kk" :options="$kompetensiKeahlian" value="{{ old('kode_kk', $data->kode_kk) }}"
                label="Kompetensi Keahlian" />
            <x-form.input name="logo" type="file" label="Upload Gambar Logo" onchange="previewImage(event)" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-center">
            <h5 class="fs-14 mb-3 mt-4">Logo Jurusan</h5>
            <img id="image-preview"
                src="{{ $data->logo && file_exists(base_path('images/jurusan_logo/' . $data->logo)) ? asset('images/jurusan_logo/' . $data->logo) : asset('images/1726416161_logosmk-big.png') }}"
                width="150" alt="Photo" />
        </div>
        <div class="col-md-4">
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
            preview.src = '{{ asset('build/images/bg-auth.jpg') }}'; // Reset to default if no file is selected
        }
    }
</script>
