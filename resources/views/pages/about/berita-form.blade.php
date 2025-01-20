<x-form.modal size="lg" title="{{ __('translation.berita') }}" action="{{ $action ?? null }}"
    enctype="multipart/form-data">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="title" value="{{ old('title', $data->title) }}" label="Title" />
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $data->content) }}</textarea>
        </div>
        <div class="col-md-6">
            <x-form.input name="image" id="image" type="file" label="Upload image berita"
                onchange="previewImage(event)" />

            <h5 class="fs-14 mb-3 mt-4">Image Berita</h5>
            <img id="image-preview"
                src="{{ $data->image && file_exists(base_path('images/thumbnail/' . $data->image)) ? asset('images/thumbnail/' . $data->image) : asset('build/images/bg-auth.jpg') }}"
                width="350" alt="Photo" />

        </div>
        <input type="hidden" name="published_at"
            value="value="{{ old('published_at', $data->published_at ? $data->published_at->format('Y-m-d\\TH:i') : '') }}">
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
