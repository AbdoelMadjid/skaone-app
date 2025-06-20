<div class="tab-content">
    <div class="tab-pane active" id="cover" role="tabpanel">
        @include('pages.walikelas.rapor-peserta-didik-rapor-sampul')
    </div>
    <div class="tab-pane" id="identsekolah" role="tabpanel">
        @include('pages.walikelas.rapor-peserta-didik-rapor-identitas')
    </div>
    <div class="tab-pane" id="nilairapor" role="tabpanel">
        <p class="mt-4">&nbsp;</p>
        @include('pages.walikelas.rapor-peserta-didik-rapor-nilai')
    </div>
    <div class="tab-pane" id="lampiran1" role="tabpanel">
        @include('pages.walikelas.rapor-peserta-didik-rapor-lampiran')
    </div>
</div>
