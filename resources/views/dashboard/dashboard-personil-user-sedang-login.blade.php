<!-- Rounded Ribbon -->
<div class="card ribbon-box border shadow-none mb-lg-4">
    <div class="card-body">
        <div class="ribbon ribbon-info round-shape">User Sedang Login</div>
        <div class="ribbon-content mt-5 text-muted">
            <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                @if ($activeUsers->isEmpty())
                    <p>No users are currently logged in.</p>
                @else
                    @foreach ($activeUsers->chunk(25) as $userChunk2)
                        <div class="col-md">
                            @foreach ($userChunk2 as $user)
                                <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                    <p class="fw-medium mb-0"><i
                                            class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                        {!! $user->name !!}</p>
                                    <div>

                                        <span class="text-success fw-medium fs-12">{{ $user->login_count }}
                                            x</span>
                                    </div>
                                </div><!-- end -->
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
