<div class="card ribbon-box border shadow-none mb-lg-0 mt-4 mt-lg-0">
    <div class="card-body">
        <div class="ribbon ribbon-primary round-shape">Ceklist Kelas Sudah Cetak</div>
        @if ($dataPilCR)
            <h5 class="fs-14 text-end">{{ $dataPilCR->tahunajaran }} / {{ $dataPilCR->semester }}</h5>
        @else
            <div class="text-danger">Data belum dipilih.</div>
        @endif
        <div class="ribbon-content mt-4 text-muted">
            <form id="cetak-rapor-checklist-form">
                <div class="mb-3">
                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                        id="accordionlefticon">
                        @foreach ($dataKelasCeklistGrouped as $tingkat => $rombels)
                            @php
                                $collapseId = 'accor_lefticonExamplecollapse' . $tingkat;
                                $headingId = 'accordionlefticonExample' . $tingkat;
                            @endphp

                            <div class="accordion-item mt-2">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $collapseId }}" aria-expanded="false"
                                        aria-controls="{{ $collapseId }}">
                                        Tingkat {{ $tingkat }} ({{ $rombels->count() }}
                                        kelas)
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionlefticon">
                                    <div class="accordion-body">
                                        @foreach ($rombels as $rombel)
                                            <div class="form-check ms-3 mb-2">
                                                <input class="form-check-input checklist-checkbox" type="checkbox"
                                                    id="checklist-{{ $rombel->kode_rombel }}" name="checklist[]"
                                                    value="{{ $rombel->kode_rombel }}"
                                                    {{ in_array($rombel->kode_rombel, $ceklistTersimpan) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="checklist-{{ $rombel->kode_rombel }}">
                                                    {{ $rombel->rombel }} -
                                                    {{ $rombel->kode_rombel }}
                                                    @if ($rombel->namalengkap)
                                                        <br><small class="text-muted">
                                                            {{ trim("{$rombel->gelardepan} {$rombel->namalengkap} {$rombel->gelarbelakang}") }}
                                                        </small>
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
