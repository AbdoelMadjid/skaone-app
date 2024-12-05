@props(['name', 'label' => null, 'options' => [], 'id' => null, 'multiple' => false])

<div class="mb-3">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
    @endif

    <select {{ $multiple ? 'multiple' : '' }} name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control">
        @foreach ($options as $idkk => $pesertas)
            <optgroup label="{{ $idkk }} - {{ $pesertas->first()->nama_kk }}">
                @foreach ($pesertas as $peserta)
                    <option value="{{ $peserta->nis }}">{{ $peserta->nis }} - {{ $peserta->nama_lengkap }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>
