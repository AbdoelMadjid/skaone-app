<x-form.modal size="sm" title="{{ __('translation.bidang-keahlian') }}" action="{{ $action ?? null }}">
    @if ($data->idbk)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="idbk" value="{{ $data->idbk }}" label="Id Bidang Keahlian" />
            <x-form.input name="nama_bk" value="{{ $data->nama_bk }}" label="Nama Bidang Keahlian" />
        </div>
    </div>
</x-form.modal>
