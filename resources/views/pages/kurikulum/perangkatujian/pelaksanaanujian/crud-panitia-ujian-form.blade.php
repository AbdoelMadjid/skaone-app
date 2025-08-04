<x-form.modal title="{{ __('translation.panitia-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-6">
            <x-form.input name="kode_ujian" value="{{ $ujianAktif?->kode_ujian }}" label="Kode Ujian" id="kode_ujian"
                readonly />
        </div>
        <div class="col-sm-6">
            <x-form.select name="id_personil" :options="$personilOptions" value="{{ old('id_personil', $data->id_personil) }}"
                id="id_personil" label="Nama Personil" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <x-form.input name="nip" value="{{ $data->nip }}" label="NIP" id="nip" />
        </div>
        <div class="col-sm-5">
            <x-form.input name="nama_lengkap" value="{{ $data->nama_lengkap }}" label="Nama Lengkap"
                id="nama_lengkap" />
        </div>
        <div class="col-sm-3">
            <x-form.select name="jabatan" label="Jabatan" :options="$jabatanPanitia" id="jabatan"
                value="{{ old('jabatan', $data->jabatan) }}" />
        </div>
    </div>
</x-form.modal>
<script>
    document.addEventListener('change', function(e) {
        if (e.target.name === 'id_personil') {
            const id = e.target.value;
            if (id) {
                fetch(`{{ route('kurikulum.perangkatujian.getpersonilPanitia') }}?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('nip').value = data.nip || '';
                        document.getElementById('nama_lengkap').value = data.nama_lengkap || '';
                    })
                    .catch(error => {
                        console.error(error);
                        document.getElementById('nip').value = '';
                        document.getElementById('nama_lengkap').value = '';
                    });
            }
        }
    });
</script>
