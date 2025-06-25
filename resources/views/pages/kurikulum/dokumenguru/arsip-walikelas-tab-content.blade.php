<div class="tab-content">
    <div class="tab-pane active" id="dataKelas" role="tabpanel">
        <div class="pb-3">
            @include('pages.kurikulum.dokumenguru.arsip-walikelas-datakelas')
        </div>
    </div>
    <div class="tab-pane" id="abSensi" role="tabpanel">
        <div class="pb-3">
            @include('pages.kurikulum.dokumenguru.arsip-walikelas-absensi')
        </div>
    </div>
    <div class="tab-pane" id="ekstraKurikuler" role="tabpanel">
        <div class="pb-3">
            @include('pages.kurikulum.dokumenguru.arsip-walikelas-eskul')
        </div>
    </div>
    <div class="tab-pane" id="prestasiSiswa" role="tabpanel">
        <div class="pb-3">
            @include('pages.kurikulum.dokumenguru.arsip-walikelas-prestasisiswa')
        </div>
    </div>
    <div class="tab-pane" id="catatanWaliKelas" role="tabpanel">
        <div class="pb-3">
            @include('pages.kurikulum.dokumenguru.arsip-walikelas-catatanwalas')
        </div>
    </div>
    <div class="tab-pane" id="kenaikan" role="tabpanel">
        <div class="pb-3">
            @include('pages.kurikulum.dokumenguru.arsip-walikelas-kenaikan')
        </div>
    </div>
    <div class="tab-pane" id="ranking" role="tabpanel">
        <div class="pb-3">
            @include('pages.kurikulum.dokumenguru.arsip-walikelas-ranking')
        </div>
    </div>
</div><!--end tab-content-->
<div id="ttd-wali" style="display:none;">
    <table width='100%' style='border: none !important;'>
        <tr>
            <td width="400" style='border: none !important;'></td>
            <td style='border: none !important;'>
                Kadipaten, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Wali Kelas,
                <p>&nbsp;</p>
                <strong>
                    {!! $datawaliKelas->gelardepan ?? '' !!}
                    {!! strtoupper(strtolower($datawaliKelas->namalengkap)) ?? '' !!},
                    {!! $datawaliKelas->gelarbelakang ?? '' !!}
                </strong><br>
                NIP. {!! $datawaliKelas->nip ?? '' !!}
            </td>
        </tr>
    </table>
</div>
