<x-form.modal size="lg" title="{{ __('translation.administrasi-admin-nego') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-3">
            <x-form.select name="tahunajaran" class="form-select-sm" label="Tahun Ajaran" :options="$tahunAjaranOptions"
                value="{{ $data->tahunajaran }}" id="tahunajaran" />
        </div>
        <div class="col-sm-9">
            <x-form.select class="form-select-md" name="id_perusahaan" label="Perusahaan" :options="$perusahaanOptions"
                value="{{ $data->id_perusahaan }}" id="id_perusahaan" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <x-form.input name="nomor_surat_pengantar" value="{{ $data->nomor_surat_pengantar }}"
                label="Nomor Surat Pengantar" id="nomor_surat_pengantar" />
        </div>
        <div class="col-sm-12">
            <x-form.input name="nomor_surat_perintah" value="{{ $data->nomor_surat_perintah }}"
                label="Nomor Surat Perintah" id="nomor_surat_perintah" />
        </div>
        <div class="col-sm-12">
            <x-form.input name="nomor_surat_mou" value="{{ $data->nomor_surat_mou }}" label="Nomor Surat MOU"
                id="nomor_surat_mou" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <x-form.input type="date" name="titimangsa" value="{{ $data->titimangsa }}" label="Titimangsa"
                id="titimangsa" />
        </div>
        <div class="col-sm-3">
            <x-form.input type="date" name="tgl_nego" value="{{ $data->tgl_nego }}" label="Tanggal Nego"
                id="tgl_nego" />
        </div>
        <div class="col-sm-6">
            <x-form.select class="form-select-md" name="id_nego" label="Negosiator" :options="$negosiatorOptions"
                value="{{ $data->id_nego }}" id="id_nego" />
        </div>
    </div>

</x-form.modal>
