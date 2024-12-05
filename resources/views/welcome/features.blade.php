<section class="section bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">User Login</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="d-flex mb-2">
                            <div class="flex-shrink-0 mt-1">
                                <i class="ri-checkbox-multiple-blank-fill text-info"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="badge bg-info-subtle text-info fs-5">User Sedang Login</span>
                            </div>
                        </div>
                        @if ($activeUsers->isEmpty())
                            <p>No users are currently logged in.</p>
                        @else
                            @foreach ($activeUsers->chunk(6) as $userRow)
                                <div class="row">
                                    @foreach ($userRow as $user)
                                        <div class="col-md-4">
                                            <x-variasi-list>
                                                {{ $user->name }} ({{ $user->login_count }})
                                            </x-variasi-list>
                                        </div><!-- end col -->
                                    @endforeach
                                </div><!-- end row -->
                            @endforeach
                        @endif
                        <hr>
                        <div class="d-flex mb-2">
                            <div class="flex-shrink-0 mt-1">
                                <i class="ri-checkbox-multiple-blank-fill text-info"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="badge bg-info-subtle text-info fs-5">User Login Hari ini</span>
                            </div>
                        </div>
                        @if ($userLoginHariini->isEmpty())
                            <p>No users have logged in today.</p>
                        @else
                            @foreach ($userLoginHariini->chunk(6) as $userRow)
                                <div class="row">
                                    @foreach ($userRow as $user)
                                        <div class="col-md-4">
                                            <x-variasi-list>
                                                {{ $user->name }} ({{ $user->login_count }})
                                            </x-variasi-list>
                                        </div><!-- end col -->
                                    @endforeach
                                </div><!-- end row -->
                            @endforeach

                        @endif
                    </div><!-- end card-body -->
                    <div class="card-footer">
                        <div class="row pt-3">
                            <div class="col-3">
                                <div class="text-center">
                                    <h4>{{ $totalLogin }}</h4>
                                    <p>Total Login</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <h4>{{ $loginTodayCount }}</h4>
                                    <p>Log Today</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>

            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</section>
