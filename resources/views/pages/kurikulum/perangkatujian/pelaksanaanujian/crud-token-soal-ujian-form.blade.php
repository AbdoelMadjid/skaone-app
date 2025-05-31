<x-form.modal title="{{ __('translation.token-soal-ujian') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input name="kode_ujian" value="{{ $ujianAktif?->kode_ujian }}" label="Kode Ujian"
                        id="kode_ujian" readonly />
                </div>
                <div class="col-sm-4">
                    <x-form.select name="tanggal_ujian" label="Tanggal Ujian" :options="$tanggalUjianOption" id="tanggal_ujian"
                        value="{{ $data->tanggal_ujian }}" />
                </div>
                <div class="col-sm-4">
                    <x-form.select name="sesi_ujian" label="Sesi Ujian" :options="['1' => '1', '2' => '2', '3' => '3', '4' => '4']" id="sesi_ujian"
                        value="{{ $data->sesi_ujian }}" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <x-form.input name="matapelajaran" value="{{ $data->matapelajaran }}" label="Mata Pelajaran"
                        id="matapelajaran" />
                </div>
                <div class="col-sm-3">
                    <x-form.input name="kelas" value="{{ $data->kelas }}" label="Kelas" id="kelas" />
                </div>
                <div class="col-sm-3">
                    <x-form.input name="token_soal" value="{{ $data->token_soal }}" label="Token Soal" id="tokensoal" />
                </div>
            </div>
        </div>
</x-form.modal>
