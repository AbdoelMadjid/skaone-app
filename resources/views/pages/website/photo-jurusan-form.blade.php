<x-form.modal size="lg" title="Photo Jurusan" action="{{ $action ?? null }}" enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="image" type="file" label="Upload Gambar Slide" onchange="previewImage(event)" />
            <h5 class="fs-14 mb-3 mt-4">Image Slide</h5>
            <img id="image-preview"
                src="{{ $data->image && file_exists(base_path('images/jurusan_gmb/' . $data->image)) ? asset('images/jurusan_gmb/' . $data->image) : asset('build/images/bg-auth.jpg') }}"
                width="350" alt="Photo" />
        </div>
        <div class="col-md-6">
            <x-form.select name="kode_kk" :options="$kompetensiKeahlian" value="{{ old('kode_kk', $data->kode_kk) }}"
                label="Kompetensi Keahlian" />
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
