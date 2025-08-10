<x-form.modal title="{{ __('translation.kompetensi-keahlian') }}" action="{{ $action ?? null }}">
    @if ($data->idkk)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="idkk" value="{{ $data->idkk }}" label="Id Kompetensi Keahlian" />
            <!-- Select untuk Bidang Keahlian -->
            <x-form.select name="id_bk" label="Bidang Keahlian" :options="$bidangKeahlian" value="{{ $data->id_bk }}" />
            <x-form.select name="id_pk" label="Program Keahlian" :options="$programKeahlian" value="{{ $data->id_pk }}" />
        </div>
        <div class="col-md-6">
            <x-form.input name="nama_kk" value="{{ $data->nama_kk }}" label="Nama Kompetensi Keahlian" />
            <x-form.input name="singkatan" value="{{ $data->singkatan }}" label="Singkatan KK" />
        </div>
    </div>
</x-form.modal>
