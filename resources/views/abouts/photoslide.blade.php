<div class="row">
    <div class="col-xl-4 col-lg-6">
        <div class="card border">
            <div class="card-body">

                <p class="text-muted">Use <code>pagination-dynamic-swiper</code> class to set a dynamic swiper with
                    pagination.</p>

                <!-- Swiper -->
                <div class="swiper pagination-dynamic-swiper rounded">
                    <div class="swiper-wrapper">
                        @foreach ($photoSlides as $index => $slide)
                            <div class="swiper-slide">
                                <img src="{{ asset('images/photoslide/' . $slide->gambar) }}" alt=""
                                    class="img-fluid" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination dynamic-pagination"></div>
                </div>

            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="col-xl-8 col-lg-6">
        <div class="card border">
            <div class="card-body">
                <div class="row">
                    @foreach ($photoSlides as $index => $slide)
                        <div class="col-md-4">
                            <img src="{{ asset('images/photoslide/' . $slide->gambar) }}" class="img-fluid"
                                alt="Responsive image">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
