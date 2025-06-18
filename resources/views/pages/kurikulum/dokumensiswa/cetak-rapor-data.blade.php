<div class="tab-content mt-4">
    <div class="tab-pane fade show active" id="cover" role="tabpanel" aria-labelledby="cover-tab">
        <div class="message-list-content mx-n4 px-4 message-list-scroll">
            @include('pages.kurikulum.dokumensiswa.cetak-rapor-data-sampul')
        </div>
    </div>
    <div class="tab-pane fade" id="identsekolah" role="tabpanel" aria-labelledby="identsekolah-tab">
        <div class="message-list-content mx-n4 px-4 message-list-scroll">
            @include('pages.kurikulum.dokumensiswa.cetak-rapor-data-identitas')
        </div>
    </div>
    <div class="tab-pane fade" id="nilairapor" role="tabpanel" aria-labelledby="nilairapor-tab">
        <div class="message-list-content mx-n4 px-4 message-list-scroll">
            @include('pages.kurikulum.dokumensiswa.cetak-rapor-data-nilai')
        </div>
    </div>
    <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
        <div class="message-list-content mx-n4 px-4 message-list-scroll">
            @include('pages.kurikulum.dokumensiswa.cetak-rapor-data-lampiran')
        </div>
    </div>
</div>
