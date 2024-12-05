<x-form.modal size="" title="{{ __('translation.capaian-pembelajaran') }}" action="{{ $action ?? null }}">
    @if ($data->idpk)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="idpk" value="{{ $data->idpk }}" label="Id Program Keahlian" />
            {{-- <x-form.input name="id_bk" value="{{ $data->id_bk }}" label="Id Bidang Keahlian" /> --}}
            <!-- Ubah input id_bk menjadi select -->
            <x-form.select name="id_bk" label="Bidang Keahlian" :options="$bidangKeahlian" value="{{ $data->id_bk }}" />

            <x-form.input name="nama_pk" value="{{ $data->nama_pk }}" label="Nama Program Keahlian" />
        </div>
</x-form.modal>
