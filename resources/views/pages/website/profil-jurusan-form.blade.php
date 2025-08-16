<x-form.modal size="md" title="{{ __('translation.profil-jurusan') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="id_kk" :options="$kompetensiKeahlian" value="{{ old('id_kk', $data->id_kk) }}"
                label="Kompetensi Keahlian" />
            <x-form.select name="tipe" :options="['profil_lulusan' => 'Profil Lulusan', 'prospek_kerja' => 'Prospek Kerja']" value="{{ old('tipe', $data->tipe) }}" label="Tipe" />
            <div id="deskripsi-wrapper">
                <x-form.textarea name="deskripsi[]" :value="old('deskripsi', $data->deskripsi)" label="Deskripsi" rows="5" />
            </div>

            <button type="button" id="add-deskripsi" class="btn btn-sm btn-outline-primary mt-2">
                + Tambah Deskripsi
            </button>
        </div>
    </div>
</x-form.modal>
<script>
    document.getElementById('add-deskripsi').addEventListener('click', function() {
        let wrapper = document.getElementById('deskripsi-wrapper');
        let index = wrapper.querySelectorAll('textarea').length;

        let newField = `
        <div class="mb-3 deskripsi-item">
            <label class="form-label">Deskripsi ${index + 1}</label>
            <textarea name="deskripsi[]" class="form-control" rows="5"></textarea>
        </div>
    `;
        wrapper.insertAdjacentHTML('beforeend', newField);
    });
</script>
