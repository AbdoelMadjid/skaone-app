<!-- partials/info-wali-siswa.blade.php -->
<div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
    <div class="hstack gap-2">
        <div class="flex-shrink-0 me-2">
            @if ($waliKelas?->photo)
                <img src="{{ URL::asset('images/personil/' . $waliKelas->photo) }}" alt="User Avatar"
                    class="rounded-circle avatar-xs user-profile-image">
            @else
                <img src="{{ URL::asset('/images/user-dummy-img.jpg') }}" alt=""
                    class="rounded-circle avatar-xs user-profile-image">
            @endif
        </div>
        <div class="flex-grow-1">
            <h5 class="fs-13 mb-1 text-truncate">
                <span class="candidate-name">
                    {{ $waliKelas?->gelardepan }} {{ $waliKelas?->namalengkap }}, {{ $waliKelas?->gelarbelakang }}
                </span>
            </h5>
            <div class="candidate-position text-muted fw-normal">{{ $waliKelas?->rombel }}
                [{{ $waliKelas?->kode_rombel }}]</div>
        </div>
    </div>
</div>
