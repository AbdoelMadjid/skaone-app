<div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <x-heading-title>@yield('title')</x-heading-title>
            <div class="flex-shrink-0">
                {{--  --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 280px);">
            <div class="col-lg-12">
                <div class="text-center pt-4">
                    <div class="">
                        <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                            colors="primary:#f06548,secondary:#f7b84b" style="width:180px;height:180px"></lord-icon>
                    </div>
                    <div class="mt-n4">
                        <h1 class="display-4 fw-medium">page : @yield('title')</h1>
                        <h3 class="text-uppercase text-danger">Sorry, Page not Found. <br>Still in the scripting
                            process.</h3>
                        <p class="mb-0 fs-10 text-info">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
