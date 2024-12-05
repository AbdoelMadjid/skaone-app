<x-form.modal size="lg" title="{{ __('translation.photo-slide') }}" action="{{ $action ?? null }}"
    enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="gambar" type="file" label="Upload Gambar Slide" onchange="previewImage(event)" />
            <h5 class="fs-14 mb-3 mt-4">Image Slide</h5>
            <img id="image-preview"
                src="{{ $data->gambar && file_exists(public_path('images/photoslide/' . $data->gambar)) ? asset('images/photoslide/' . $data->gambar) : asset('build/images/bg-auth.jpg') }}"
                width="350" alt="Photo" />
        </div>
        <div class="col-md-6">
            <x-form.input name="alt_text" value="{{ $data->alt_text }}" label="Alternatife Text" />
            <x-form.input id="interval" name="interval" value="{{ $data->interval }}" min="1000"
                label="Interval (ms)" />
            <x-form.select name="is_active" id="is_active" :options="['1' => 'Ya', '0' => 'Tidak']"
                value="{{ old('is_active', $data->is_active) }}" label="Aktifkan Slide" />
            {{-- <div>
                <label for="interval">Interval (ms):</label>
                <input type="number" id="interval" name="interval" value="2000" min="1000" required>
            </div> --}}
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
