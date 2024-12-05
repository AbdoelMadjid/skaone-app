<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h3 class="mb-3 fw-semibold">Our <span class="text-danger">Team</span></h3>
                    <p class="text-muted mb-4 ff-secondary">Team Teknik Informatika</p>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row align-items-center mt-1 pt-lg-1 gy-4">

            @foreach ($teamPengembang as $team)
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body text-center p-4">
                            <div class="avatar-xl mx-auto mb-4 position-relative">
                                <img class="img-thumbnail rounded-circle avatar-xl" alt="{{ $team->namalengkap }}"
                                    src="{{ asset('images/team/' . $team->photo) }}">
                            </div>
                            <!-- end card body -->
                            <h5 class="mb-1"><a href="" class="text-body">{{ $team->namalengkap }}</a>
                            </h5>
                            <p class="text-muted mb-0 ff-secondary">{{ $team->jabatan }}</p>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            @endforeach
            <!-- end col -->
        </div>
        <!-- end row -->
        {{-- <div class="row">
        <div class="col-lg-12">
            <div class="text-center mt-2">
                <a href="/pages_team" class="btn btn-primary">View All Members <i
                        class="ri-arrow-right-line ms-1 align-bottom"></i></a>
            </div>
        </div>
    </div> --}}
        <!-- end row -->
    </div>
</section>
