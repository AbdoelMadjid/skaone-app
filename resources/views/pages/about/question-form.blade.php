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
                <label for="question_type">Jenis Pertanyaan</label>
                <select name="question_type" id="question_type" class="form-select">
                    <option value="text"
                        {{ old('question_type', $data->question_type ?? '') === 'text' ? 'selected' : '' }}>Isian
                    </option>
                    <option value="multiple_choice"
                        {{ old('question_type', $data->question_type ?? '') === 'multiple_choice' ? 'selected' : '' }}>
                        Pilihan Ganda</option>
                </select>
            </div>

            @php
                $choices = old('choice_descriptions', $data->choice_descriptions ?? []);
                if (!is_array($choices)) {
                    $choices = json_decode($choices, true) ?? [];
                }
                $isMultiple = old('question_type', $data->question_type ?? '') === 'multiple_choice';
            @endphp

            <div id="choice_descriptions_container" style="display: {{ $isMultiple ? 'block' : 'none' }};">
                <div class="form-text mb-2">
                    Deskripsi untuk nilai 1-5
                </div>
                @for ($i = 1; $i <= 5; $i++)
                    <div class="mb-2">
                        <input type="text" name="choice_descriptions[{{ $i }}]" class="form-control"
                            placeholder="Deskripsi nilai {{ $i }}" value="{{ $choices[$i] ?? '' }}">
                    </div>
                @endfor
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
