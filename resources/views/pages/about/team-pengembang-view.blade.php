@foreach ($teamPengembang as $team)
    <div class="col-lg-3">
        <div class="card text-center">
            <div class="card-body p-4 bg-info-subtle">
                <!-- Display the team member's photo -->
                <img src="{{ asset('images/team/' . $team->photo) }}" alt="{{ $team->namalengkap }}"
                    class="rounded-circle avatar-xl mx-auto d-block">
                <!-- Display the team member's name -->
                <h5 class="fs-17 mt-3 mb-2">{{ $team->namalengkap }}</h5>

                <!-- Display the team member's position -->
                <p class="text-muted fs-13 mb-3">{{ $team->jabatan }}</p>

                <!-- Optional: Display a description or location -->
                <p class="text-muted mb-4 fs-14">
                    {{ $team->deskripsi }}
                </p>
            </div>
        </div>
    </div>
@endforeach
