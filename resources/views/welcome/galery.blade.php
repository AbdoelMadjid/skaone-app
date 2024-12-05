<section class="section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h3 class="mb-3 fw-semibold">Cerita dalam <span class="text-danger">GAMBAR</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <ul class="list-inline categories-filter animation-nav" id="filter">
                                        <li class="list-inline-item"><a class="categories active"
                                                data-filter="*">All</a>
                                        </li>
                                        @foreach ($categoryGalery as $category)
                                            @php
                                                // Mengubah kategori menjadi lowercase dan mengganti spasi dengan tanda hubung
                                                $categoryClass = strtolower(str_replace(' ', '-', $category));
                                            @endphp
                                            <li class="list-inline-item">
                                                <a class="categories"
                                                    data-filter=".{{ $categoryClass }}">{{ $category }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="row gallery-wrapper">
                                    @foreach ($galleries as $gallery)
                                        @php
                                            $categoryClass = strtolower(str_replace(' ', '-', $gallery->category));
                                            $authorName = strtolower(explode(' ', $gallery->author)[0]); // Mengambil kata pertama dan mengubah ke lowercase
                                        @endphp
                                        <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project {{ $categoryClass }}"
                                            data-category="{{ $categoryClass }}">
                                            <div class="gallery-box card">
                                                <div class="gallery-container">
                                                    <a class="image-popup"
                                                        href="{{ asset('images/galery/' . $gallery->image) }}"
                                                        title="{{ $gallery->title }}">
                                                        <img class="gallery-img img-fluid mx-auto"
                                                            src="{{ asset('images/thumbnail/' . $gallery->image) }}"
                                                            alt="{{ $gallery->title }}" />
                                                        <div class="gallery-overlay">
                                                            <h5 class="overlay-caption">{{ $gallery->title }}</h5>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="box-content">
                                                    <div class="d-flex align-items-center mt-1">
                                                        <div class="flex-grow-1 text-muted">
                                                            by <a href="#"
                                                                class="text-body text-truncate">{{ $authorName }}</a>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div class="d-flex gap-3">
                                                                <button type="button"
                                                                    class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                    <i
                                                                        class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                                    {{ number_format($gallery->likes) }}
                                                                </button>
                                                                <button type="button"
                                                                    class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                    <i
                                                                        class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                                    {{ number_format($gallery->comments) }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- end row -->

                                {{-- <div class="text-center my-2">
                                    <a href="javascript:void(0);" class="text-success"><i
                                            class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- ene card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>
</section>
