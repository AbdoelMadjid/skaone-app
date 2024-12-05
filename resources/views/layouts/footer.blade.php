@php
    $layout = $layout ?? null;
@endphp

@if ($layout === 'auth')
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            {{ $profileApp->app_tahun ?? '' }}
                            <script>
                                document.write(new Date().getFullYear())
                            </script> {{ $profileApp->app_nama ?? '' }}. Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by
                            {{ $profileApp->app_pengembang ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@else
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    {{ $profileApp->app_tahun ?? '' }} -
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © {{ $profileApp->app_nama ?? '' }}.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by {{ $profileApp->app_pengembang ?? '' }}
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endif
