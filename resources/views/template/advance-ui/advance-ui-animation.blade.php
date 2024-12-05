@extends('layouts.master')
@section('title')
    @lang('translation.animation')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/aos/aos.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.components')
        @endslot
        @slot('li_2')
            @lang('translation.advance-ui')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h4 class="card-title mb-0">Fade Animation</h4>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Up</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-up">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-lg-8">
                                                <div data-aos="fade-up">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Down</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-down">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-lg-8">
                                                <div data-aos="fade-down">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Right</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-right">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-right">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Left</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-left">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-left">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Up Right</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-up-right">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-up-right">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Up Left</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-up-left">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-up-left">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Down Right</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-down-right">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-down-right">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Fade Down Left</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-down-left">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-down-left">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}" alt="Mac Image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h4 class="card-title mb-0">Flip Animation</h4>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Flip Left</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="flip-left">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="flip-left">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Flip Right</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="flip-right">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="flip-right">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Flip Up</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="flip-up">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="flip-up">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Flip Down</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="flip-down">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="flip-down">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h4 class="card-title mb-0">Zoom Animation</h4>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom In</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-in">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-in">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom In Up</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-in-up">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-in-up">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom In Down</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-in-down">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-in-down">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom In Right</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-in-right">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-in-right">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom In Left</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-in-left">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-in-left">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom Out</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-in">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-out">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom Out Up</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-out-up">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-out-up">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom Out Down</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-out-down">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-out-down">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom Out Right</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-out-right">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-out-right">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Zoom Out Left</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="zoom-out-left">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="zoom-out-left">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h4 class="card-title mb-0">Animation Examples</h4>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Duration</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-up" data-aos-duration="3000">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-up" data-aos-duration="3000">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Easing="linear"</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-down" data-aos-easing="linear"
                                                    data-aos-duration="1500">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Offset</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-right" data-aos-offset="300"
                                                    data-aos-easing="ease-in-sine">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Offset</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-left" data-aos-offset="500" data-aos-duration="500">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-left" data-aos-offset="500" data-aos-duration="500">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Easing="ease-in-back"</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="fade-zoom-in" data-aos-easing="ease-in-back"
                                                    data-aos-delay="300" data-aos-offset="0">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="p-4 pb-0 border mt-4">
                                        <h4 class="mb-4 text-center">Easing="ease-out-cubic"</h4>
                                        <pre><code class="language-markup">&lt;div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">&lt;/div></code></pre>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-8">
                                                <div data-aos="flip-left" data-aos-easing="ease-out-cubic"
                                                    data-aos-duration="2000">
                                                    <img src="{{ URL::asset('build/images/mac-img.png') }}"
                                                        alt="Mac Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/animation-aos.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
