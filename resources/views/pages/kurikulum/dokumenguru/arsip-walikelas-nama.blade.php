@if ($wali)
    <p><strong>Nama : </strong> {{ $wali->gelardepan }} {{ $wali->namalengkap }} {{ $wali->gelarbelakang }}
        <strong>NIP : </strong> {{ $wali->nip ?? '-' }}
    </p>
@else
    <div class="alert alert-warning">Data wali kelas tidak ditemukan.</div>
@endif
