<x-form.modal size="lg" title="{{ __('translation.penempatan-prakerin') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions" value="{{ $data->tahunajaran }}"
                id="tahunajaran" />
        </div>
        <div class="col-md-6">
            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions" value="{{ $data->kode_kk }}"
                id="kode_kk" />
        </div>
        <div class="col-md-12 mb-4">
            {{-- <x-form.select class="form-select" id="noinduksiswa" name="nis" label="Peserta Didik" :options="$pesertaDidikOptions"
                value="{{ $data->nis }}" /> --}}
            <label for="noinduksiswa" class="form-label">Peserta Didik</label>
            <select class="form-select form-select-md" id="noinduksiswa" name="nis">
                <option value="">Pilih Peserta Didik</option>
                @foreach ($pesertaDidikOptions as $rombelNama => $siswaList)
                    <optgroup label="{{ $rombelNama }}">
                        @foreach ($siswaList as $nis => $label)
                            <option value="{{ $nis }}" {{ $data->nis == $nis ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <x-form.select class="form-select" name="id_dudi" label="Perusahaan" :options="$perusahaanOptions"
                value="{{ $data->id_dudi }}" id="datadudi" />
        </div>
    </div>
</x-form.modal>
