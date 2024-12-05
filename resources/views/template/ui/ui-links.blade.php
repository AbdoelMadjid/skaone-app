@extends('layouts.master')
@section('title')
    @lang('translation.links')
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Link colors</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="link-colors-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="link-colors-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">You can use the <code>.link-*</code> classes to colorize links. Unlike the <a
                            href="/ui_colors"><code>.text-*</code> classes</a>, these classes have a <code>:hover</code> and
                        <code>:focus</code> state. Some of the link styles use a relatively light foreground color, and
                        should only be used on a dark background in order to have sufficient contrast.
                    </p>
                    <div class="live-preview">
                        <p><a href="#" class="link-primary">Primary link</a></p>
                        <p><a href="#" class="link-secondary">Secondary link</a></p>
                        <p><a href="#" class="link-success">Success link</a></p>
                        <p><a href="#" class="link-danger">Danger link</a></p>
                        <p><a href="#" class="link-warning">Warning link</a></p>
                        <p><a href="#" class="link-info">Info link</a></p>
                        <p><a href="#" class="link-light">Light link</a></p>
                        <p><a href="#" class="link-dark">Dark link</a></p>
                        <p><a href="#" class="link-body-emphasis mb-0">Emphasis link</a></p>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 280px;"><code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-primary&quot;&gt;Primary link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-secondary&quot;&gt;Secondary link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-success&quot;&gt;Success link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-danger&quot;&gt;Danger link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-warning&quot;&gt;Warning link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-info&quot;&gt;Info link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-light&quot;&gt;Light link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-dark&quot;&gt;Dark link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-body-emphasis mb-0&quot;&gt;Emphasis link&lt;/a&gt;&lt;/p&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Link utilities</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="link-utilities-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="link-utilities-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Colored links can also be modified by our link utilities.</p>
                    <div class="live-preview">
                        <p><a href="#"
                                class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Primary
                                link</a></p>
                        <p><a href="#"
                                class="link-secondary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Secondary
                                link</a></p>
                        <p><a href="#"
                                class="link-success link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Success
                                link</a></p>
                        <p><a href="#"
                                class="link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Danger
                                link</a></p>
                        <p><a href="#"
                                class="link-warning link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Warning
                                link</a></p>
                        <p><a href="#"
                                class="link-info link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Info
                                link</a></p>
                        <p><a href="#"
                                class="link-light link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Light
                                link</a></p>
                        <p><a href="#"
                                class="link-dark link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Dark
                                link</a></p>
                        <p><a href="#"
                                class="link-body-emphasis link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-75-hover mb-0">Emphasis
                                link</a></p>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 280px;"><code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Primary link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-secondary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Secondary link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-success link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Success link&lt;/a&gt;&lt;/p&gt;</code>

<Code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Danger link&lt;/a&gt;&lt;/p&gt;</Code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-warning link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Warning link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-info link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Info link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-light link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Light link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-dark link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover&quot;&gt;Dark link&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;link-body-emphasis link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-75-hover mb-0&quot;&gt;Emphasis link&lt;/a&gt;&lt;/p&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Link Opacity</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="link-opacity-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="link-opacity-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Change the alpha opacity of the link <code>rgba()</code> color value with
                        utilities. Please be aware that changes to a color’s opacity can lead to links with <a
                            href="https://getbootstrap.com/docs/5.3/getting-started/accessibility/#color-contrast"
                            target="_blank"><em>insufficient</em> contrast</a>.</p>
                    <div class="live-preview">
                        <p><a class="link-opacity-10" href="#">Link opacity 10</a></p>
                        <p><a class="link-opacity-25" href="#">Link opacity 25</a></p>
                        <p><a class="link-opacity-50" href="#">Link opacity 50</a></p>
                        <p><a class="link-opacity-75" href="#">Link opacity 75</a></p>
                        <p class="mb-0"><a class="link-opacity-100" href="#">Link opacity 100</a></p>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;p&gt;&lt;a class=&quot;link-opacity-10&quot; href=&quot;#&quot;&gt;Link opacity 10&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-25&quot; href=&quot;#&quot;&gt;Link opacity 25&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-50&quot; href=&quot;#&quot;&gt;Link opacity 50&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-75&quot; href=&quot;#&quot;&gt;Link opacity 75&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-100&quot; href=&quot;#&quot;&gt;Link opacity 100&lt;/a&gt;&lt;/p&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Link Opacity Hover</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="link-hover-opacity-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox"
                                id="link-hover-opacity-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">You can even change the opacity level on hover.</p>
                    <div class="live-preview">
                        <p><a class="link-opacity-10-hover" href="#">Link hover opacity 10</a></p>
                        <p><a class="link-opacity-25-hover" href="#">Link hover opacity 25</a></p>
                        <p><a class="link-opacity-50-hover" href="#">Link hover opacity 50</a></p>
                        <p><a class="link-opacity-75-hover" href="#">Link hover opacity 75</a></p>
                        <p class="mb-0"><a class="link-opacity-100-hover" href="#">Link hover opacity 100</a></p>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 195px;"><code>&lt;p&gt;&lt;a class=&quot;link-opacity-10-hover&quot; href=&quot;#&quot;&gt;Link hover opacity 10&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-25-hover&quot; href=&quot;#&quot;&gt;Link hover opacity 25&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-50-hover&quot; href=&quot;#&quot;&gt;Link hover opacity 50&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-75-hover&quot; href=&quot;#&quot;&gt;Link hover opacity 75&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-opacity-100-hover&quot; href=&quot;#&quot;&gt;Link hover opacity 100&lt;/a&gt;&lt;/p&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-xxl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Underline color</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="underline-color-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="underline-color-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Change the underline’s color independent of the link text color.</p>
                    <div class="live-preview">
                        <p><a href="#" class="text-decoration-underline link-underline-primary">Primary
                                underline</a></p>
                        <p><a href="#" class="text-decoration-underline link-underline-secondary">Secondary
                                underline</a></p>
                        <p><a href="#" class="text-decoration-underline link-underline-success">Success
                                underline</a></p>
                        <p><a href="#" class="text-decoration-underline link-underline-danger">Danger underline</a>
                        </p>
                        <p><a href="#" class="text-decoration-underline link-underline-warning">Warning
                                underline</a></p>
                        <p><a href="#" class="text-decoration-underline link-underline-info">Info underline</a></p>
                        <p><a href="#" class="text-decoration-underline link-underline-light">Light underline</a>
                        </p>
                        <p class="mb-0"><a href="#" class="text-decoration-underline link-underline-dark">Dark
                                underline</a></p>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-primary&quot;&gt;Primary underline&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-secondary&quot;&gt;Secondary underline&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-success&quot;&gt;Success underline&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-danger&quot;&gt;Danger underline&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-warning&quot;&gt;Warning underline&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-info&quot;&gt;Info underline&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-light&quot;&gt;Light underline&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p class=&quot;mb-0&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;text-decoration-underline link-underline-dark&quot;&gt;Dark underline&lt;/a&gt;&lt;/p&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xxl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Underline opacity</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="underline-opacity-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox"
                                id="underline-opacity-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Change the underline’s opacity. Requires adding <code>.link-underline</code> to
                        first set an <code>rgba()</code> color we use to then modify the alpha opacity.</p>
                    <div class="live-preview">
                        <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-0"
                                href="#">Underline opacity 0</a></p>
                        <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-10"
                                href="#">Underline opacity 10</a></p>
                        <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-25"
                                href="#">Underline opacity 25</a></p>
                        <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-50"
                                href="#">Underline opacity 50</a></p>
                        <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-75"
                                href="#">Underline opacity 75</a></p>
                        <p class="mb-0"><a
                                class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-100"
                                href="#">Underline opacity 100</a></p>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;p&gt;&lt;a class=&quot;link-offset-2 text-decoration-underline link-underline link-underline-opacity-0&quot; href=&quot;#&quot;&gt;Underline opacity 0&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 text-decoration-underline link-underline link-underline-opacity-10&quot; href=&quot;#&quot;&gt;Underline opacity 10&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 text-decoration-underline link-underline link-underline-opacity-25&quot; href=&quot;#&quot;&gt;Underline opacity 25&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 text-decoration-underline link-underline link-underline-opacity-50&quot; href=&quot;#&quot;&gt;Underline opacity 50&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 text-decoration-underline link-underline link-underline-opacity-75&quot; href=&quot;#&quot;&gt;Underline opacity 75&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p class=&quot;mb-0&quot;&gt;&lt;a class=&quot;link-offset-2 text-decoration-underline link-underline link-underline-opacity-100&quot; href=&quot;#&quot;&gt;Underline opacity 100&lt;/a&gt;&lt;/p&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xxl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Underline offset</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="underline-offset-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="underline-offset-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Change the underline’s distance from your text. Offset is set in <code>em</code>
                        units to automatically scale with the element’s current <code>font-size</code>.</p>
                    <div class="live-preview">
                        <p><a href="#">Default link</a></p>
                        <p><a class="text-decoration-underline link-offset-1" href="#">Offset 1 link</a></p>
                        <p><a class="text-decoration-underline link-offset-2" href="#">Offset 2 link</a></p>
                        <p class="mb-0"><a class="text-decoration-underline link-offset-3" href="#">Offset 3
                                link</a></p>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;p&gt;&lt;a class=&quot;link-offset-2 link-underline link-underline-opacity-0&quot; href=&quot;#&quot;&gt;Underline opacity 0&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 link-underline link-underline-opacity-10&quot; href=&quot;#&quot;&gt;Underline opacity 10&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 link-underline link-underline-opacity-25&quot; href=&quot;#&quot;&gt;Underline opacity 25&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 link-underline link-underline-opacity-50&quot; href=&quot;#&quot;&gt;Underline opacity 50&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 link-underline link-underline-opacity-75&quot; href=&quot;#&quot;&gt;Underline opacity 75&lt;/a&gt;&lt;/p&gt;</code>

<code>&lt;p&gt;&lt;a class=&quot;link-offset-2 link-underline link-underline-opacity-100&quot; href=&quot;#&quot;&gt;Underline opacity 100&lt;/a&gt;&lt;/p&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
