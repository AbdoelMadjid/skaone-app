@extends('layouts.master')
@section('title')
    @lang('translation.embed-video')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.components')
        @endslot
        @slot('li_2')
            @lang('translation.base-ui')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Ratio Video 16:9</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="ratiovideo1-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="ratiovideo1-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Wrap any embed in<code>&lt;iframe&gt;</code> tag, in a parent element, use
                        <code>ratio-16x9</code> class to set aspect ratio 16:9.
                    </p>
                    <div class="live-preview">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="rounded" src="https://www.youtube.com/embed/1y_kfWUCFDQ" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Ratio Video 16:9 --&gt;
&lt;div class=&quot;ratio ratio-16x9&quot;&gt;
&lt;iframe src=&quot;https://www.youtube.com/embed/1y_kfWUCFDQ&quot; title=&quot;YouTube video&quot; allowfullscreen&gt;&lt;/iframe&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Ratio Video 4:3</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="ratiovideo3-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="ratiovideo3-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>ratio-4x3</code> class to set aspect ratio 4:3.</p>
                    <div class="live-preview">
                        <!-- 4:3 aspect ratio -->
                        <div class="ratio ratio-4x3">
                            <iframe class="rounded" src="https://www.youtube.com/embed/PHcgN1GTjdU" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Ratio Video 4:3 --&gt;
&lt;div class=&quot;ratio ratio-4x3&quot;&gt;
&lt;iframe src=&quot;https://www.youtube.com/embed/1y_kfWUCFDQ&quot; title=&quot;YouTube video&quot; allowfullscreen&gt;&lt;/iframe&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Custom Ratios</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="ratiovideocustom-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="ratiovideocustom-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>--vz-aspect-ratio: 50%</code> to style element to set aspect ratio 2:1.
                    </p>
                    <div class="live-preview">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio" style="--vz-aspect-ratio: 50%;">
                            <iframe class="rounded" src="https://www.youtube.com/embed/2RZQN_ko0iU" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Custom Ratio Video --&gt;
&lt;div class=&quot;ratio&quot; style=&quot;--vz-aspect-ratio: 50%;&quot;&gt;
&lt;iframe src=&quot;https://www.youtube.com/embed/2RZQN_ko0iU&quot; title=&quot;YouTube video&quot; allowfullscreen&gt;&lt;/iframe&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->

        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Ratio Video 21:9</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="ratiovideo2-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="ratiovideo2-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>ratio-21x9</code> class to set aspect ratio 21:9.</p>
                    <div class="live-preview">
                        <!-- 21:9 aspect ratio -->
                        <div class="ratio ratio-21x9">
                            <iframe class="rounded" src="https://www.youtube.com/embed/Z-fV2lGKnnU" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Ratio Video 21:9 --&gt;
&lt;div class=&quot;ratio ratio-21x9&quot;&gt;
&lt;iframe src=&quot;https://www.youtube.com/embed/Z-fV2lGKnnU&quot; title=&quot;YouTube video&quot; allowfullscreen&gt;&lt;/iframe&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Ratio Video 1:1</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="ratiovideo4-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="ratiovideo4-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>ratio-1x1</code> class to set aspect ratio 1:1.</p>
                    <div class="live-preview">
                        <!-- 1:1 aspect ratio -->
                        <div class="ratio ratio-1x1">
                            <iframe class="rounded" src="https://www.youtube.com/embed/GfSZtaoc5bw" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Ratio Video 1:1 --&gt;
&lt;div class=&quot;ratio ratio-1x1&quot;&gt;
&lt;iframe src=&quot;https://www.youtube.com/embed/GfSZtaoc5bw&quot; title=&quot;YouTube video&quot; allowfullscreen&gt;&lt;/iframe&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div><!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
