<x-form.modal title="Pertanyaan" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="polling_id" id="polling_id" :options="$pollingId"
                value="{{ old('polling_id', $data->polling_id ?? '') }}" label="Polling" />
            <x-form.input name="question_text" value="{{ old('question_text', $data->question_text ?? '') }}"
                label="Pertanyaan" />
            <div class="mb-3">
                <label for="question_type">Jenis Pertanyaan</label><br>
                <select name="question_type" id="question_type" class="form-select">
                    <option value="text"
                        {{ old('question_type', $data->question_type ?? '') == 'text' ? 'selected' : '' }}>
                        Isian
                    </option>
                    <option value="multiple_choice"
                        {{ old('question_type', $data->question_type ?? '') == 'multiple_choice' ? 'selected' : '' }}>
                        Pilihan Ganda</option>
                </select>
                <div id="choice_descriptions_container" style="display: none;">
                    <div class="form-text mb-2 mt-2">
                        Deskripsi pilihan hanya berlaku untuk jenis pertanyaan Pilihan Ganda.
                    </div>
                    <label for="choice_descriptions" class="form-label">Deskripsi Pilihan 1-5</label>
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="text" name="choice_descriptions[{{ $i }}]" class="form-control"
                            placeholder="Deskripsi nilai {{ $i }}"
                            value="{{ old('choice_descriptions.' . $i, $data->choice_descriptions[$i] ?? '') }}">
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-form.modal>
<script>
    const select = document.getElementById('question_type');
    const container = document.getElementById('choice_descriptions_container');

    function toggleChoices() {
        container.style.display = select.value === 'multiple_choice' ? 'block' : 'none';
    }

    select.addEventListener('change', toggleChoices);
    window.addEventListener('DOMContentLoaded', toggleChoices);
</script>
