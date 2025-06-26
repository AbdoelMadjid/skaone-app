<!-- Rounded Ribbon -->
<div class="card ribbon-box border shadow-none mb-lg-4">
    <div class="card-body">
        <div class="ribbon ribbon-primary round-shape">Peserta Didik Login Hari ini</div>
        <div class="ribbon-content mt-5 text-muted">
            <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                @if ($userLoginHariiniSiswa->isEmpty())
                    <p>No users have logged in today.</p>
                @else
                    <div class="row">
                        @foreach ($userLoginHariiniSiswa->chunk(2) as $userRow)
                            <div class="row">
                                @foreach ($userRow as $user)
                                    <div class="col-md-6">
                                        <div
                                            class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                            <p class="fw-medium mb-0">
                                                @if ($user->avatar == 'siswacewek.png' || $user->avatar == 'siswacowok.png')
                                                    <img src="{{ URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                        alt="" class="avatar-xs rounded-circle me-2">
                                                @else
                                                    <img src="{{ URL::asset('images/peserta_didik/' . $user->avatar . '') }}"
                                                        alt="" class="avatar-xs rounded-circle me-2">
                                                @endif
                                                {{ $user->nis }} -
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
