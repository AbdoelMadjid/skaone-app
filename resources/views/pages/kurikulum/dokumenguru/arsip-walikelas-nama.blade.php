<h3><i class="ri-file-user-line text-muted align-bottom me-1"></i> Wali Kelas :</h3>
@if ($wali)
    <p><strong>Nama : </strong> {{ $wali->gelardepan }} {{ $wali->namalengkap }} {{ $wali->gelarbelakang }}
        <strong>NIP : </strong> {{ $wali->nip ?? '-' }}
    </p>
@else
    <div class="alert alert-warning">Data wali kelas tidak ditemukan.</div>
@endif
