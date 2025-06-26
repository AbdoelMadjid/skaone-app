<!-- Rounded Ribbon -->
<div class="card ribbon-box border shadow-none mb-lg-4">
    <div class="card-body">
        <div class="ribbon ribbon-primary round-shape">Personil Sekolah Login Hari ini</div>
        <h5 class="fs-14 text-end">

        </h5>
        <div class="ribbon-content mt-5 text-muted">
            <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                @if ($userLoginHariiniPersonil->isEmpty())
                    <p>No users have logged in today.</p>
                @else
                    <div class="row">
                        @foreach ($userLoginHariiniPersonil->chunk(2) as $userRow)
                            <div class="row">
                                @foreach ($userRow as $user)
                                    <div class="col-md-6">
                                        <div
                                            class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                            <p class="fw-medium mb-0">
                                                @php
                                                    $avatarPath = base_path('images/personil/' . $user->avatar);
                                                    $avatarExists = file_exists($avatarPath) && !is_dir($avatarPath);
                                                @endphp

                                                @if ($user->avatar == 'personil.jpg' || !$avatarExists)
                                                    <img src="{{ asset('build/images/users/user-dummy-img.jpg') }}"
                                                        alt="" class="avatar-xs rounded-circle me-2">
                                                @else
                                                    <img src="{{ asset('images/personil/' . $user->avatar) }}"
                                                        alt="" class="avatar-xs rounded-circle me-2">
                                                @endif

                                                {{ str_replace('Pgw_', '', $user->personal_id) }} -
                                                {!! $user->name !!}
                                            </p>
                                            <div>
                                                <span class="text-success fw-medium fs-12">{{ $user->login_count }}
                                                    x</span>
                                            </div>
                                        </div><!-- end -->
                                    </div><!-- end col -->
                                @endforeach
                            </div><!-- end row -->
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
