@extends('layouts.master')
@section('title')
    @lang('translation.buttons')
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Default Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="default" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="default">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use the<code> btn</code> class to show the default button
                        style.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Primary</button>
                            <button type="button" class="btn btn-secondary waves-effect waves-light">Secondary</button>
                            <button type="button" class="btn btn-success waves-effect waves-light">Success</button>
                            <button type="button" class="btn btn-info waves-effect waves-light">Info</button>
                            <button type="button" class="btn btn-warning waves-effect waves-light">Warning</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light">Danger</button>
                            <button type="button" class="btn btn-dark waves-effect waves-light">Dark</button>
                            <button type="button" class="btn btn-link waves-effect">Link</button>
                            <button type="button" class="btn btn-light waves-effect">Light</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Base Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary waves-effect waves-light&quot;&gt;Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-secondary waves-effect waves-light&quot;&gt;Secondary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success waves-effect waves-light&quot;&gt;Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-info waves-effect waves-light&quot;&gt;Info&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-warning waves-effect waves-light&quot;&gt;Warning&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-danger waves-effect waves-light&quot;&gt;Danger&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-dark waves-effect waves-light&quot;&gt;Dark&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-light waves-effect&quot;&gt;Light&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Outline Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="outline-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="outline-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-outline-</code> class with the below-mentioned
                        variation to create a button with the outline.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Primary</button>
                            <button type="button"
                                class="btn btn-outline-secondary waves-effect waves-light">Secondary</button>
                            <button type="button" class="btn btn-outline-success waves-effect waves-light">Success</button>
                            <button type="button" class="btn btn-outline-info waves-effect waves-light">Info</button>
                            <button type="button" class="btn btn-outline-warning waves-effect waves-light">Warning</button>
                            <button type="button" class="btn btn-outline-danger waves-effect waves-light">Danger</button>
                            <button type="button" class="btn btn-outline-dark waves-effect waves-light">Dark</button>
                            <button type="button" class="btn btn-outline-light waves-effect">Light</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Outline Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary waves-effect waves-light&quot;&gt;Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary waves-effect waves-light&quot;&gt;Secondary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-success waves-effect waves-light&quot;&gt;Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-info waves-effect waves-light&quot;&gt;Info&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-warning waves-effect waves-light&quot;&gt;Warning&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger waves-effect waves-light&quot;&gt;Danger&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark waves-effect waves-light&quot;&gt;Dark&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-light waves-effect&quot;&gt;Light&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-21">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Rounded Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="rounded-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="rounded-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use the <code>rounded-pill </code>class to make a rounded
                        button.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button"
                                class="btn rounded-pill btn-primary waves-effect waves-light">Primary</button>
                            <button type="button" class="btn rounded-pill btn-secondary waves-effect">Secondary</button>
                            <button type="button"
                                class="btn rounded-pill btn-success waves-effect waves-light">Success</button>
                            <button type="button" class="btn rounded-pill btn-info waves-effect waves-light">Info</button>
                            <button type="button"
                                class="btn rounded-pill btn-warning waves-effect waves-light">Warning</button>
                            <button type="button"
                                class="btn rounded-pill btn-danger waves-effect waves-light">Danger</button>
                            <button type="button"
                                class="btn rounded-pill btn-dark waves-effect waves-light">Dark</button>
                            <button type="button" class="btn rounded-pill btn-light waves-effect">Light</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Rounded Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-primary waves-effect waves-light&quot;&gt;Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-secondary waves-effect waves-light&quot;&gt;Secondary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-success waves-effect waves-light&quot;&gt;Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-info waves-effect waves-light&quot;&gt;Info&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-warning waves-effect waves-light&quot;&gt;Warning&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-danger waves-effect waves-light&quot;&gt;Danger&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-dark waves-effect waves-light&quot;&gt;Dark&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn rounded-pill btn-light waves-effect&quot;&gt;Light&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Soft Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="soft-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="soft-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-soft-</code> class with the below-mentioned
                        variation to create a button with the soft background.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-soft-primary waves-effect waves-light">Primary</button>
                            <button type="button"
                                class="btn btn-soft-secondary waves-effect waves-light">Secondary</button>
                            <button type="button" class="btn btn-soft-success waves-effect waves-light">Success</button>
                            <button type="button" class="btn btn-soft-info waves-effect waves-light">Info</button>
                            <button type="button" class="btn btn-soft-warning waves-effect waves-light">Warning</button>
                            <button type="button" class="btn btn-soft-danger waves-effect waves-light">Danger</button>
                            <button type="button" class="btn btn-soft-dark waves-effect waves-light">Dark</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Soft Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-primary waves-effect waves-light&quot;&gt;Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-secondary waves-effect&quot;&gt;secondary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-success waves-effect waves-light&quot;&gt;Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-info waves-effect waves-light&quot;&gt;Info&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-warning waves-effect waves-light&quot;&gt;Warning&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-danger waves-effect waves-light&quot;&gt;Danger&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-dark waves-effect waves-light&quot;&gt;Dark&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Ghost Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="ghost-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="ghost-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-ghost-</code> class with the below-mentioned
                        variation to create a button with the transparent background.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-ghost-primary waves-effect waves-light">Primary</button>
                            <button type="button"
                                class="btn btn-ghost-secondary waves-effect waves-light">Secondary</button>
                            <button type="button" class="btn btn-ghost-success waves-effect waves-light">Success</button>
                            <button type="button" class="btn btn-ghost-info waves-effect waves-light">Info</button>
                            <button type="button" class="btn btn-ghost-warning waves-effect waves-light">Warning</button>
                            <button type="button" class="btn btn-ghost-danger waves-effect waves-light">Danger</button>
                            <button type="button" class="btn btn-ghost-dark waves-effect waves-light">Dark</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- ghost Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-ghost-primary waves-effect waves-light&quot;&gt;Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-ghost-secondary waves-effect&quot;&gt;secondary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-ghost-success waves-effect waves-light&quot;&gt;Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-ghost-info waves-effect waves-light&quot;&gt;Info&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-ghost-warning waves-effect waves-light&quot;&gt;Warning&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-ghost-danger waves-effect waves-light&quot;&gt;Danger&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-ghost-dark waves-effect waves-light&quot;&gt;Dark&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Gradient Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="gradient-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="gradient-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>bg-gradient </code>class to create a gradient
                        button.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button"
                                class="btn btn-primary bg-gradient waves-effect waves-light">Primary</button>
                            <button type="button"
                                class="btn btn-secondary bg-gradient waves-effect waves-light">Secondary</button>
                            <button type="button"
                                class="btn btn-success bg-gradient waves-effect waves-light">Success</button>
                            <button type="button" class="btn btn-info bg-gradient waves-effect waves-light">Info</button>
                            <button type="button"
                                class="btn btn-warning bg-gradient waves-effect waves-light">Warning</button>
                            <button type="button"
                                class="btn btn-danger bg-gradient waves-effect waves-light">Danger</button>
                            <button type="button" class="btn btn-dark bg-gradient waves-effect waves-light">Dark</button>
                            <button type="button"
                                class="btn btn-light bg-gradient waves-effect waves-light">Light</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;!-- Gradient Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary bg-gradient waves-effect waves-light&quot;&gt;Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-secondary bg-gradient waves-effect waves-light&quot;&gt;Secondary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success bg-gradient waves-effect waves-light&quot;&gt;Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-info bg-gradient waves-effect waves-light&quot;&gt;Info&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-warning bg-gradient waves-effect waves-light&quot;&gt;Warning&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-danger bg-gradient waves-effect waves-light&quot;&gt;Danger&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-dark bg-gradient waves-effect waves-light&quot;&gt;Dark&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-light bg-gradient waves-effect waves-light&quot;&gt;Light&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Animation Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="animation-button" class="form-label text-muted">Show
                                Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="animation-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>bg-animation </code>class to create an animated
                        button.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary btn-animation waves-effect waves-light"
                                data-text="Primary"><span>Primary</span></button>
                            <button type="button" class="btn btn-secondary btn-animation waves-effect waves-light"
                                data-text="Secondary"><span>Secondary</span></button>
                            <button type="button" class="btn btn-success btn-animation waves-effect waves-light"
                                data-text="Success"><span>Success</span></button>
                            <button type="button" class="btn btn-info btn-animation waves-effect waves-light"
                                data-text="Info"><span>Info</span></button>
                            <button type="button" class="btn btn-warning btn-animation waves-effect waves-light"
                                data-text="Warning"><span>Warning</span></button>
                            <button type="button" class="btn btn-danger btn-animation waves-effect waves-light"
                                data-text="Danger"><span>Danger</span></button>
                            <button type="button" class="btn btn-dark btn-animation waves-effect waves-light"
                                data-text="Dark"><span>Dark</span></button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;!-- Animation Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-animation waves-effect waves-light&quot; data-text=&quot;Primary&quot;&gt;&lt;span&gt;Primary&lt;/span&gt;&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-secondary btn-animation waves-effect waves-light&quot; data-text=&quot;Secondary&quot;&gt;&lt;span&gt;Secondary&lt;/span&gt;&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success btn-animation waves-effect waves-light&quot; data-text=&quot;Success&quot;&gt;&lt;span&gt;Success&lt;/span&gt;&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-info btn-animation waves-effect waves-light&quot; data-text=&quot;Info&quot;&gt;&lt;span&gt;Info&lt;/span&gt;&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-warning btn-animation waves-effect waves-light&quot; data-text=&quot;Warning&quot;&gt;&lt;span&gt;Warning&lt;/span&gt;&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-danger btn-animation waves-effect waves-light&quot; data-text=&quot;Danger&quot;&gt;&lt;span&gt;Danger&lt;/span&gt;&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-dark btn-animation waves-effect waves-light&quot; data-text=&quot;Dark&quot;&gt;&lt;span&gt;Dark&lt;/span&gt;&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons with Label</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="label-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="label-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-label </code>class to create a button with the
                        label.</p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-wrap gap-2 mb-3 mb-lg-0">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-label">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                Primary
                                            </div>
                                        </div>
                                    </a>
                                    <button type="button" class="btn btn-success btn-label"><i
                                            class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>
                                        Success</button>
                                    <button type="button" class="btn btn-warning btn-label"><i
                                            class="ri-error-warning-line label-icon align-middle fs-16 me-2 "></i>
                                        Warning</button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div class="d-flex flex-wrap gap-2 mb-3 mb-lg-0">
                                    <button type="button" class="btn btn-primary btn-label rounded-pill"><i
                                            class="ri-user-smile-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                        Primary</button>
                                    <button type="button" class="btn btn-success btn-label rounded-pill"><i
                                            class="ri-check-double-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                        Success</button>
                                    <button type="button" class="btn btn-warning btn-label rounded-pill"><i
                                            class="ri-error-warning-line label-icon align-middle rounded-pill fs-16 me-2 "></i>
                                        Warning</button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="button" class="btn btn-primary btn-label right"><i
                                            class="ri-user-smile-line label-icon align-middle fs-16 ms-2"></i>
                                        Primary</button>
                                    <button type="button" class="btn btn-success btn-label right rounded-pill"><i
                                            class="ri-check-double-line label-icon align-middle rounded-pill fs-16 ms-2"></i>
                                        Success</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Buttons with Label --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-label waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-user-smile-line label-icon align-middle fs-16 me-2&quot;&gt;&lt;/i&gt; Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success btn-label waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-check-double-line label-icon align-middle fs-16 me-2&quot;&gt;&lt;/i&gt; Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-warning btn-label waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-error-warning-line label-icon align-middle fs-16 me-2&quot;&gt;&lt;/i&gt; Warning&lt;/button&gt;</code>

<code>&lt;!-- Rounded with Label --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-label waves-effect waves-light rounded-pill&quot;&gt;&lt;i class=&quot;ri-user-smile-line label-icon align-middle rounded-pill fs-16 me-2&quot;&gt;&lt;/i&gt; Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success btn-label waves-effect waves-light rounded-pill&quot;&gt;&lt;i class=&quot;ri-check-double-line label-icon align-middle rounded-pill fs-16 me-2&quot;&gt;&lt;/i&gt; Success&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-warning btn-label waves-effect waves-light rounded-pill&quot;&gt;&lt;i class=&quot;ri-error-warning-line label-icon align-middle rounded-pill fs-16 me-2&quot;&gt;&lt;/i&gt; Warning&lt;/button&gt;</code>

<code>&lt;!-- Buttons with Label Right --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-label waves-effect right waves-light&quot;&gt;&lt;i class=&quot;ri-user-smile-line label-icon align-middle fs-16 ms-2&quot;&gt;&lt;/i&gt; Primary&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success btn-label waves-effect right waves-light rounded-pill&quot;&gt;&lt;i class=&quot;ri-check-double-line label-icon align-middle rounded-pill fs-16 ms-2&quot;&gt;&lt;/i&gt; Success&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Load More Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="load-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="load-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Example of loading buttons.</p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                                    <button class="btn btn-outline-primary btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="spinner-border flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                            <span class="flex-grow-1 ms-2">
                                                Loading...
                                            </span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="spinner-border flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                            <span class="flex-grow-1 ms-2">
                                                Loading...
                                            </span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="spinner-grow flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                            <span class="flex-grow-1 ms-2">
                                                Loading...
                                            </span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="spinner-grow flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                            <span class="flex-grow-1 ms-2">
                                                Loading...
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="d-flex flex-wrap gap-2 mb-3 mb-lg-0">
                                    <button class="btn btn-outline-primary btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="flex-grow-1 me-2">
                                                Loading...
                                            </span>
                                            <span class="spinner-border flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="flex-grow-1 me-2">
                                                Loading...
                                            </span>
                                            <span class="spinner-border flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-outline-warning btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="flex-grow-1 me-2">
                                                Loading...
                                            </span>
                                            <span class="spinner-grow flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-info btn-load">
                                        <span class="d-flex align-items-center">
                                            <span class="flex-grow-1 me-2">
                                                Loading...
                                            </span>
                                            <span class="spinner-grow flex-shrink-0" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Load More Buttons --&gt;
&lt;div class=&quot;hstack flex-wrap gap-2 mb-3 mb-lg-0&quot;&gt;
&lt;button class=&quot;btn btn-outline-primary btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;spinner-border flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;span class=&quot;flex-grow-1 ms-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-success btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;spinner-border flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;span class=&quot;flex-grow-1 ms-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;spinner-grow flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;span class=&quot;flex-grow-1 ms-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-danger btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;spinner-grow flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;span class=&quot;flex-grow-1 ms-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;/div&gt;</code>

<code>&lt;div class=&quot;d-flex flex-wrap gap-2 mb-3 mb-lg-0&quot;&gt;
&lt;button class=&quot;btn btn-outline-primary btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;flex-grow-1 me-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;span class=&quot;spinner-border flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-success btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;flex-grow-1 me-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;span class=&quot;spinner-border flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-warning btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;flex-grow-1 me-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;span class=&quot;spinner-grow flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-info btn-load&quot;&gt;
&lt;span class=&quot;d-flex align-items-center&quot;&gt;
&lt;span class=&quot;flex-grow-1 me-2&quot;&gt;
Loading...
&lt;/span&gt;
&lt;span class=&quot;spinner-grow flex-shrink-0&quot; role=&quot;status&quot;&gt;
&lt;span class=&quot;visually-hidden&quot;&gt;Loading...&lt;/span&gt;
&lt;/span&gt;
&lt;/span&gt;
&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Border Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="border-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="border-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Example of simple bottom borderd buttons.</p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                                    <button class="btn btn-primary btn-border">Primary</button>
                                    <button class="btn btn-secondary btn-border">Secondary</button>
                                    <button class="btn btn-success btn-border">Success</button>
                                    <button class="btn btn-warning btn-border">Warning</button>
                                    <button class="btn btn-danger btn-border">Danger</button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                                    <button class="btn btn-outline-primary btn-border">Primary</button>
                                    <button class="btn btn-outline-secondary btn-border">Secondary</button>
                                    <button class="btn btn-outline-success btn-border">Success</button>
                                    <button class="btn btn-soft-warning btn-border">Warning</button>
                                    <button class="btn btn-soft-danger btn-border">Danger</button>
                                    <button class="btn btn-soft-dark btn-border">Dark</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Border Buttons --&gt;
&lt;div class=&quot;hstack flex-wrap gap-2 mb-3 mb-lg-0&quot;&gt;
&lt;button class=&quot;btn btn-primary btn-border&quot;&gt;Primary&lt;/button&gt;
&lt;button class=&quot;btn btn-secondary btn-border&quot;&gt;Secondary&lt;/button&gt;
&lt;button class=&quot;btn btn-success btn-border&quot;&gt;Success&lt;/button&gt;
&lt;button class=&quot;btn btn-warning btn-border&quot;&gt;Warning&lt;/button&gt;
&lt;button class=&quot;btn btn-danger btn-border&quot;&gt;Danger&lt;/button&gt;
&lt;/div&gt;</code>

<code>&lt;div class=&quot;hstack flex-wrap gap-2 mb-3 mb-lg-0&quot;&gt;
&lt;button class=&quot;btn btn-outline-primary btn-border&quot;&gt;Primary&lt;/button&gt;
&lt;button class=&quot;btn btn-outline-secondary btn-border&quot;&gt;Secondary&lt;/button&gt;
&lt;button class=&quot;btn btn-outline-success btn-border&quot;&gt;Success&lt;/button&gt;
&lt;button class=&quot;btn btn-soft-warning btn-border&quot;&gt;Warning&lt;/button&gt;
&lt;button class=&quot;btn btn-soft-danger btn-border&quot;&gt;Danger&lt;/button&gt;
&lt;button class=&quot;btn btn-soft-dark btn-border&quot;&gt;Dark&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Custom Toggle Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="custom-toggle-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="custom-toggle-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Example of toggle buttons.</p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <button type="button" class="btn btn-primary custom-toggle active"
                                        data-bs-toggle="button">
                                        <span class="icon-on"><i class="ri-alarm-line align-bottom"></i> Active</span>
                                        <span class="icon-off">Unactive</span>
                                    </button>
                                    <button type="button" class="btn btn-secondary custom-toggle active"
                                        data-bs-toggle="button">
                                        <span class="icon-on"><i class="ri-user-add-line align-bottom me-1"></i>
                                            Connect</span>
                                        <span class="icon-off"><i class="ri-check-fill align-bottom me-1"></i>
                                            Unconnect</span>
                                    </button>
                                    <button type="button" class="btn btn-success custom-toggle" data-bs-toggle="button">
                                        <span class="icon-on"><i class="ri-thumb-up-line align-bottom me-1"></i>
                                            Yes</span>
                                        <span class="icon-off"><i class="ri-thumb-down-line align-bottom me-1"></i>
                                            No</span>
                                    </button>
                                    <button type="button" class="btn btn-warning custom-toggle active"
                                        data-bs-toggle="button">
                                        <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Follow</span>
                                        <span class="icon-off"><i class="ri-user-unfollow-line align-bottom me-1"></i>
                                            Unfollow</span>
                                    </button>
                                    <button type="button" class="btn btn-danger custom-toggle" data-bs-toggle="button">
                                        <span class="icon-on">On</span>
                                        <span class="icon-off">Off</span>
                                    </button>
                                    <button type="button" class="btn btn-dark custom-toggle" data-bs-toggle="button">
                                        <span class="icon-on"><i class="ri-bookmark-line align-bottom me-1"></i>
                                            Bookmark</span>
                                        <span class="icon-off"><i class="ri-bookmark-3-fill align-bottom me-1"></i>
                                            Unbookmark</span>
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <button type="button" class="btn btn-outline-primary custom-toggle"
                                        data-bs-toggle="button">
                                        <span class="icon-on">Active</span>
                                        <span class="icon-off">Unactive</span>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary custom-toggle"
                                        data-bs-toggle="button">
                                        <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Follow</span>
                                        <span class="icon-off"><i class="ri-user-unfollow-line align-bottom me-1"></i>
                                            Unfollow</span>
                                    </button>
                                    <button type="button" class="btn btn-outline-success custom-toggle active"
                                        data-bs-toggle="button">
                                        <span class="icon-on">On</span>
                                        <span class="icon-off">Off</span>
                                    </button>
                                    <button type="button" class="btn btn-soft-warning custom-toggle active"
                                        data-bs-toggle="button">
                                        <span class="icon-on">Follow</span>
                                        <span class="icon-off">Unfollow</span>
                                    </button>
                                    <button type="button" class="btn btn-soft-danger custom-toggle"
                                        data-bs-toggle="button">
                                        <span class="icon-on">On</span>
                                        <span class="icon-off">Off</span>
                                    </button>
                                    <button type="button" class="btn btn-dark custom-toggle active"
                                        data-bs-toggle="button">
                                        <span class="icon-on"><i class="ri-bookmark-line align-bottom"></i></span>
                                        <span class="icon-off"><i class="ri-bookmark-3-fill align-bottom"></i></span>
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Custom Toggle Buttons --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary custom-toggle active&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;&lt;i class=&quot;ri-alarm-line align-bottom&quot;&gt;&lt;/i&gt; Active&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;Unactive&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-secondary custom-toggle active&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;&lt;i class=&quot;ri-user-add-line align-bottom me-1&quot;&gt;&lt;/i&gt; Connect&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;&lt;i class=&quot;ri-check-fill align-bottom me-1&quot;&gt;&lt;/i&gt; Unconnect&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success custom-toggle&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;&lt;i class=&quot;ri-thumb-up-line align-bottom me-1&quot;&gt;&lt;/i&gt; Yes&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;&lt;i class=&quot;ri-thumb-down-line align-bottom me-1&quot;&gt;&lt;/i&gt; No&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-warning custom-toggle active&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;&lt;i class=&quot;ri-add-line align-bottom me-1&quot;&gt;&lt;/i&gt; Follow&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;&lt;i class=&quot;ri-user-unfollow-line align-bottom me-1&quot;&gt;&lt;/i&gt; Unfollow&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-danger custom-toggle&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;On&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;Off&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-dark custom-toggle&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;&lt;i class=&quot;ri-bookmark-line align-bottom me-1&quot;&gt;&lt;/i&gt; Bookmark&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;&lt;i class=&quot;ri-bookmark-3-fill align-bottom me-1&quot;&gt;&lt;/i&gt; Unbookmark&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary custom-toggle&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;Active&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;Unactive&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary custom-toggle&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;&lt;i class=&quot;ri-add-line align-bottom me-1&quot;&gt;&lt;/i&gt; Follow&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;&lt;i class=&quot;ri-user-unfollow-line align-bottom me-1&quot;&gt;&lt;/i&gt; Unfollow&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-success custom-toggle active&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;On&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;Off&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-warning custom-toggle active&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;Follow&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;Unfollow&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-soft-danger custom-toggle&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;On&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;Off&lt;/span&gt;
&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-dark custom-toggle active&quot; data-bs-toggle=&quot;button&quot;&gt;
    &lt;span class=&quot;icon-on&quot;&gt;&lt;i class=&quot;ri-bookmark-line align-bottom&quot;&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;span class=&quot;icon-off&quot;&gt;&lt;i class=&quot;ri-bookmark-3-fill align-bottom&quot;&gt;&lt;/i&gt;&lt;/span&gt;
&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons Sizes</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="size-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="size-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-lg</code> class to create a large size button
                        and <code>btn-sm</code> class to create a small size button.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <!-- Large Button -->
                            <button type="button" class="btn btn-primary btn-lg">Large button</button>
                            <button type="button" class="btn btn-light btn-lg">Large button</button>

                            <!-- Small Button -->
                            <button type="button" class="btn btn-primary btn-sm">Small button</button>
                            <button type="button" class="btn btn-light btn-sm">Small button</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Large Button --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-lg&quot;&gt;Large button&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-light btn-lg&quot;&gt;Large button&lt;/button&gt;</code>

<code>&lt;!-- Small Button --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot;&gt;Small button&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-light btn-sm&quot;&gt;Small button&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons Width</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="width-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="width-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>w-xs,w-sm,w-md,w-lg</code> class to make different
                        sized buttons respectively.
                    <p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary w-xs waves-effect waves-light">Xs</button>
                            <button type="button" class="btn btn-danger w-sm waves-effect waves-light">Small</button>
                            <button type="button" class="btn btn-warning w-md waves-effect waves-light">Medium</button>
                            <button type="button" class="btn btn-success w-lg waves-effect waves-light">Large</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Width Button --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary w-xs waves-effect waves-light&quot;&gt;Xs&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-danger w-sm waves-effect waves-light&quot;&gt;Small&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-warning w-md waves-effect waves-light&quot;&gt;Medium&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success w-lg waves-effect waves-light&quot;&gt;Large&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons Tag</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="tag-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="tag-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn</code> class with different HTML elements.
                        (though some browsers may apply a slightly different rendering)
                    <p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <a class="btn btn-primary waves-effect waves-light" href="#" role="button">Link</a>
                            <button class="btn btn-success waves-effect waves-light" type="submit">Button</button>
                            <input class="btn btn-info" type="button" value="Input">
                            <input class="btn btn-danger" type="submit" value="Submit">
                            <input class="btn btn-warning" type="reset" value="Reset">
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;!-- Tag Button --&gt;
&lt;a class=&quot;btn btn-primary waves-effect waves-light&quot; href=&quot;#&quot; role=&quot;button&quot;&gt;Link&lt;/a&gt;</code>

<code>&lt;button class=&quot;btn btn-success waves-effect waves-light&quot; type=&quot;submit&quot;&gt;Button&lt;/button&gt;</code>

<code>&lt;input class=&quot;btn btn-info&quot; type=&quot;button&quot; value=&quot;Input&quot;&gt;</code>

<code>&lt;input class=&quot;btn btn-danger&quot; type=&quot;submit&quot; value=&quot;Submit&quot;&gt;</code>

<code>&lt;input class=&quot;btn btn-warning&quot; type=&quot;reset&quot; value=&quot;Reset&quot;&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Base class</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="base-class" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="base-class">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">
                        Bootstrap has a base <code>.btn</code> class that sets up basic styles such as padding and content
                        alignment. By default, <code>.btn</code> controls have a transparent border and background color,
                        and lack any explicit focus and hover styles.
                    </p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn">Base class</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;button type=&quot;button&quot; class=&quot;btn&quot;&gt;Base class&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Custom sizing with CSS variables</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="custom-sizing-variables" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="custom-sizing-variables">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">
                        You can even roll your own custom sizing with CSS variables:
                    </p>
                    <div class="live-preview">
                        <button type="button" class="btn btn-primary"
                            style="--tb-btn-padding-y: .25rem; --tb-btn-padding-x: .5rem; --tb-btn-font-size: .75rem;">
                            Custom button
                        </button>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup"><code>&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; style=&quot;--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;&quot;&gt;
    Custom button
&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons Toggle Status</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="toggle-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="toggle-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">
                        Use <code>data-bs-toggle="button"</code> to toggle a buttonâ€™s active state.
                    </p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                data-bs-toggle="button" aria-pressed="false">
                                Single toggle
                            </button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Toggle Button Status --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary waves-effect waves-light&quot; data-bs-toggle=&quot;button&quot; aria-pressed=&quot;false&quot;&gt;
Single toggle
&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons Grid</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="grid-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="grid-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">

                    <p class="text-muted">
                        Use <code>d-grid</code> class to create a full-width block button.
                    </p>
                    <div class="live-preview">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-primary" type="button">Button</button>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Buttons Grid --&gt;
&lt;div class=&quot;d-grid gap-2&quot; &gt;
&lt;button class=&quot;btn btn-primary&quot; type=&quot;button&quot;&gt;Button&lt;/button&gt;
&lt;button class=&quot;btn btn-primary&quot; type=&quot;button&quot;&gt;Button&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Checkbox & Radio Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="checkbox-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="checkbox-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">
                        Combine button-like <code>checkbox and radio</code> <a
                            href="https://getbootstrap.com/docs/5.1/forms/checks-radios/">toggle
                            buttons</a> into a seamless looking button group.
                    </p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" checked="">
                                <label class="btn btn-primary mb-0" for="btncheck1">Checkbox 1</label>

                                <input type="checkbox" class="btn-check" id="btncheck2">
                                <label class="btn btn-primary mb-0" for="btncheck2">Checkbox 2</label>

                                <input type="checkbox" class="btn-check" id="btncheck3">
                                <label class="btn btn-primary mb-0" for="btncheck3">Checkbox 3</label>
                            </div>

                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked="">
                                <label class="btn btn-outline-secondary mb-0" for="btnradio1">Radio
                                    1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                <label class="btn btn-outline-secondary mb-0" for="btnradio2">Radio
                                    2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                <label class="btn btn-outline-secondary mb-0" for="btnradio3">Radio
                                    3</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;">
<code>&lt;!-- Checkbox Buttons --&gt;
&lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;Basic checkbox toggle button group&quot;&gt;
&lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;btncheck1&quot; autocomplete=&quot;off&quot; checked=&quot;&quot;&gt;
&lt;label class=&quot;btn btn-primary&quot; for=&quot;btncheck1&quot;&gt;Checkbox 1&lt;/label&gt;

&lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;btncheck2&quot; autocomplete=&quot;off&quot;&gt;
&lt;label class=&quot;btn btn-primary&quot; for=&quot;btncheck2&quot;&gt;Checkbox 2&lt;/label&gt;

&lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;btncheck3&quot; autocomplete=&quot;off&quot;&gt;
&lt;label class=&quot;btn btn-primary&quot; for=&quot;btncheck3&quot;&gt;Checkbox 3&lt;/label&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Radio Buttons --&gt;
&lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;Basic radio toggle button group&quot;&gt;
&lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;btnradio&quot; id=&quot;btnradio1&quot; autocomplete=&quot;off&quot; checked=&quot;&quot;&gt;
&lt;label class=&quot;btn btn-outline-secondary&quot; for=&quot;btnradio1&quot;&gt;Radio 1&lt;/label&gt;

&lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;btnradio&quot; id=&quot;btnradio2&quot; autocomplete=&quot;off&quot;&gt;
&lt;label class=&quot;btn btn-outline-secondary&quot; for=&quot;btnradio2&quot;&gt;Radio 2&lt;/label&gt;

&lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;btnradio&quot; id=&quot;btnradio3&quot; autocomplete=&quot;off&quot;&gt;
&lt;label class=&quot;btn btn-outline-secondary&quot; for=&quot;btnradio3&quot;&gt;Radio 3&lt;/label&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons Group</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="group-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="group-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">

                    <p class="text-muted">Use the <code>btn-group </code> class in the parent class to
                        wrap a series of buttons.</p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">Left</button>
                                    <button type="button" class="btn btn-primary">Middle</button>
                                    <button type="button" class="btn btn-primary">Right</button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-sm-6">
                                <div class="btn-group mt-4 mt-sm-0" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-light btn-icon"><i
                                            class="ri-align-right"></i></button>
                                    <button type="button" class="btn btn-light btn-icon"><i
                                            class="ri-align-center"></i></button>
                                    <button type="button" class="btn btn-light btn-icon"><i
                                            class="ri-align-left"></i></button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Buttons Group --&gt;
&lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;Basic example&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;Left&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;Middle&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;Right&lt;/button&gt;
&lt;/div&gt;</code>

<code>&lt;div class=&quot;btn-group mt-4 mt-md-0&quot; role=&quot;group&quot; aria-label=&quot;Basic example&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;&lt;i class=&quot;ri-align-right&quot;&gt;&lt;/i&gt;&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;&lt;i class=&quot;ri-align-center&quot;&gt;&lt;/i&gt;&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;&lt;i class=&quot;ri-align-left&quot;&gt;&lt;/i&gt;&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Icon Buttons</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="icon-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="icon-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-icon</code> class to wrap icon in button</p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="hstack gap-2 ">
                                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i
                                            class="ri-map-pin-line"></i></button>
                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i
                                            class="ri-delete-bin-5-line"></i></button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light"><i
                                            class="ri-check-double-line"></i></button>
                                    <button type="button" class="btn btn-light btn-icon waves-effect"><i
                                            class="ri-brush-2-fill"></i></button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-sm-6">
                                <div class="hstack gap-2 mt-4 mt-sm-0">
                                    <button type="button"
                                        class="btn btn-outline-primary btn-icon waves-effect waves-light"><i
                                            class="ri-24-hours-fill"></i></button>
                                    <button type="button"
                                        class="btn btn-outline-danger btn-icon waves-effect waves-light"><i
                                            class="ri-customer-service-2-line"></i></button>
                                    <button type="button"
                                        class="btn btn-outline-success btn-icon waves-effect waves-light"><i
                                            class="ri-mail-send-line"></i></button>
                                    <button type="button"
                                        class="btn btn-outline-warning btn-icon waves-effect waves-light"><i
                                            class="ri-menu-2-line"></i></button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Buttons Group --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-map-pin-line&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code>
<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-danger btn-icon waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-delete-bin-5-line&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code>
<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-success btn-icon waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-check-double-line&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code>
<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-light btn-icon waves-effect&quot;&gt;&lt;i class=&quot;ri-brush-2-fill&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code>

<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary btn-icon waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-24-hours-fill&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code>
<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger btn-icon waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-customer-service-2-line&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code>
<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-success btn-icon waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-mail-send-line&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code>
<code>&lt;button type=&quot;button&quot; class=&quot;btn btn-outline-warning btn-icon waves-effect waves-light&quot;&gt;&lt;i class=&quot;ri-menu-2-line&quot;&gt;&lt;/i&gt;&lt;/button&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Buttons Toolbar</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="toolbar-button" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="toolbar-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-toolbar</code> class to combine sets of button
                        groups into more complex components.</p>
                    <div class="live-preview">
                        <div class="d-flex flex-wrap gap-3">
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-light">1</button>
                                    <button type="button" class="btn btn-light">2</button>
                                    <button type="button" class="btn btn-light">3</button>
                                    <button type="button" class="btn btn-light">4</button>
                                </div>
                                <div class="btn-group me-2" role="group" aria-label="Second group">
                                    <button type="button" class="btn btn-light">5</button>
                                    <button type="button" class="btn btn-light">6</button>
                                    <button type="button" class="btn btn-light">7</button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Third group">
                                    <button type="button" class="btn btn-light">8</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;!-- Buttons Toolbar --&gt;
&lt;div class=&quot;btn-toolbar&quot; role=&quot;toolbar&quot; aria-label=&quot;Toolbar with button groups&quot;&gt;
&lt;div class=&quot;btn-group me-2&quot; role=&quot;group&quot; aria-label=&quot;First group&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;1&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;2&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;3&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;4&lt;/button&gt;
&lt;/div&gt;
&lt;div class=&quot;btn-group me-2&quot; role=&quot;group&quot; aria-label=&quot;Second group&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;5&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;6&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;7&lt;/button&gt;
&lt;/div&gt;
&lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;Third group&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;8&lt;/button&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Button Group Sizing</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="group-size-button" class="form-label text-muted">Show
                                Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="group-size-button">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>btn-group-</code> class with the below-mentioned
                        variation to set the different sizes of button groups.</p>

                    <div class="live-preview">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary">Left</button>
                                <button type="button" class="btn btn-primary">Middle</button>
                                <button type="button" class="btn btn-primary">Right</button>
                            </div>
                            <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Left</button>
                                <button type="button" class="btn btn-light">Middle</button>
                                <button type="button" class="btn btn-light">Right</button>
                            </div>
                            <div class="btn-group btn-group-sm mt-2" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary">Left</button>
                                <button type="button" class="btn btn-secondary">Middle</button>
                                <button type="button" class="btn btn-secondary">Right</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;">
<code>&lt;!-- Group Buttons Sizing --&gt;
&lt;div class=&quot;btn-group btn-group-lg&quot; role=&quot;group&quot; aria-label=&quot;Basic example&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;Left&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;Middle&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;Right&lt;/button&gt;
&lt;/div&gt;</code>

<code>&lt;div class=&quot;btn-group mt-2&quot; role=&quot;group&quot; aria-label=&quot;Basic example&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;Left&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;Middle&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;Right&lt;/button&gt;
&lt;/div&gt;</code>

<code>&lt;div class=&quot;btn-group btn-group-sm mt-2&quot; role=&quot;group&quot; aria-label=&quot;Basic example&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot;&gt;Left&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot;&gt;Middle&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot;&gt;Right&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col+-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Vertical Variation</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="vertical-variation" class="form-label text-muted">Show
                                Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="vertical-variation">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Make a set of buttons appear <code>vertically</code> stacked
                        .Split button dropdowns are not supported here.</p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-auto">
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <button type="button" class="btn btn-primary">1</button>
                                    <button type="button" class="btn btn-primary">2</button>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-auto">
                                <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                    <button type="button" class="btn btn-light">Button</button>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupVerticalDrop1" type="button"
                                            class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                            <a class="dropdown-item" href="#">Dropdown link</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-light">Button</button>
                                    <button type="button" class="btn btn-light">Button</button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group-vertical" role="group"
                                    aria-label="Vertical radio toggle button group">
                                    <input type="radio" class="btn-check" name="vbtn" id="vbtn-radio1"
                                        checked="">
                                    <label class="btn btn-outline-secondary" for="vbtn-radio1">Radio
                                        1</label>
                                    <input type="radio" class="btn-check" name="vbtn" id="vbtn-radio2">
                                    <label class="btn btn-outline-secondary" for="vbtn-radio2">Radio
                                        2</label>
                                    <input type="radio" class="btn-check" name="vbtn" id="vbtn-radio3">
                                    <label class="btn btn-outline-secondary" for="vbtn-radio3">Radio
                                        3</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;">
<code>&lt;!-- Vertical Variation --&gt;
&lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;Button group with nested dropdown&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;1&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;2&lt;/button&gt;
&lt;div class=&quot;btn-group&quot; role=&quot;group&quot;&gt;
&lt;button id=&quot;btnGroupDrop1&quot; type=&quot;button&quot; class=&quot;btn btn-primary dropdown-toggle&quot; data-bs-toggle=&quot;dropdown&quot; aria-expanded=&quot;false&quot;&gt;
Dropdown
&lt;/button&gt;
&lt;ul class=&quot;dropdown-menu&quot; aria-labelledby=&quot;btnGroupDrop1&quot;&gt;
&lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Dropdown link&lt;/a&gt;&lt;/li&gt;
&lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Dropdown link&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;</code>

<code>&lt;div class=&quot;btn-group-vertical&quot; role=&quot;group&quot; aria-label=&quot;Vertical button group&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;Button&lt;/button&gt;
&lt;div class=&quot;btn-group&quot; role=&quot;group&quot;&gt;
&lt;button id=&quot;btnGroupVerticalDrop1&quot; type=&quot;button&quot; class=&quot;btn btn-light dropdown-toggle&quot; data-bs-toggle=&quot;dropdown&quot; aria-haspopup=&quot;true&quot; aria-expanded=&quot;false&quot;&gt;
Dropdown
&lt;/button&gt;
&lt;div class=&quot;dropdown-menu&quot; aria-labelledby=&quot;btnGroupVerticalDrop1&quot;&gt;
&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Dropdown link&lt;/a&gt;
&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Dropdown link&lt;/a&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;Button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-light&quot;&gt;Button&lt;/button&gt;
&lt;/div&gt;</code>

<code>&lt;div class=&quot;btn-group-vertical&quot; role=&quot;group&quot; aria-label=&quot;Vertical radio toggle button group&quot;&gt;
&lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;vbtn&quot; id=&quot;vbtn-radio1&quot; checked=&quot;&quot;&gt;
&lt;label class=&quot;btn btn-outline-secondary&quot; for=&quot;vbtn-radio1&quot;&gt;Radio 1&lt;/label&gt;
&lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;vbtn&quot; id=&quot;vbtn-radio2&quot;&gt;
&lt;label class=&quot;btn btn-outline-secondary&quot; for=&quot;vbtn-radio2&quot;&gt;Radio 2&lt;/label&gt;
&lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;vbtn&quot; id=&quot;vbtn-radio3&quot;&gt;
&lt;label class=&quot;btn btn-outline-secondary&quot; for=&quot;vbtn-radio3&quot;&gt;Radio 3&lt;/label&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Focus Ring</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="focus-ring" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="focus-ring">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Click directly on the link below to see the focus ring in action, or into the
                        example below and then press <kbd>Tab</kbd>.</p>
                    <div class="live-preview">
                        <div class="d-flex gap-3">
                            <a href="#!"
                                class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2">
                                Focus ring
                            </a>
                            <!--custom focus ring color-->
                            <a href="#!"
                                class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2"
                                style="--vz-focus-ring-color: rgba(118, 93, 255, .25)">
                                Custom focus ring
                            </a>
                            <!---custom blurry offset focus ring-->
                            <a href="#!"
                                class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2"
                                style="--vz-focus-ring-x: 10px; --vz-focus-ring-y: 10px; --vz-focus-ring-blur: 4px">
                                Blurry offset focus ring
                            </a>
                        </div>
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;a href=&quot;#!&quot; class=&quot;d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2&quot;&gt;
    Focus ring
&lt;/a&gt;</code>

<code>&lt;!--custom focus ring color--&gt;
    &lt;a href=&quot;#!&quot; class=&quot;d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2&quot; style=&quot;--vz-focus-ring-color: rgba(118, 93, 255, .25)&quot;&gt;
    Custom focus ring
&lt;/a&gt;</code>

<code>&lt;!---custom blurry offset focus ring--&gt;
    &lt;a href=&quot;#!&quot; class=&quot;d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2&quot; style=&quot;--vz-focus-ring-x: 10px; --vz-focus-ring-y: 10px; --vz-focus-ring-blur: 4px&quot;&gt;
    Blurry offset focus ring
&lt;/a&gt;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Focus Ring Utilities</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="focus-ring-utilities" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="focus-ring-utilities">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">In addition to <code>.focus-ring</code>, we have several
                        <code>.focus-ring-*</code> utilities to modify the helper class defaults. Modify the color with any
                        of our <a href="ui-colors">theme colors</a>. Note that the light and dark variants may not be
                        visible on all background colors given current color mode support.
                    </p>
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2">Primary
                                        focus</a></p>
                                <p><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2">Secondary
                                        focus</a></p>
                                <p><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-success py-1 px-2 text-decoration-none border rounded-2">Success
                                        focus</a></p>
                                <p class="mb-lg-0"><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2">Danger
                                        focus</a></p>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <p><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-warning py-1 px-2 text-decoration-none border rounded-2">Warning
                                        focus</a></p>
                                <p><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-info py-1 px-2 text-decoration-none border rounded-2">Info
                                        focus</a></p>
                                <p><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-light py-1 px-2 text-decoration-none border rounded-2">Light
                                        focus</a></p>
                                <p class="mb-0"><a href="#!"
                                        class="d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2">Dark
                                        focus</a></p>
                            </div><!--end col-->
                        </div><!-- end row -->
                    </div>
                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Primary focus&lt;/a&gt;&lt;/p&gt;</code>

        <code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Secondary focus&lt;/a&gt;&lt;/p&gt;</code>

        <code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-success py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Success focus&lt;/a&gt;&lt;/p&gt;</code>

        <code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Danger focus&lt;/a&gt;&lt;/p&gt;</code>

        <code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-warning py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Warning focus&lt;/a&gt;&lt;/p&gt;</code>

        <code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-info py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Info focus&lt;/a&gt;&lt;/p&gt;</code>

        <code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-light py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Light focus&lt;/a&gt;&lt;/p&gt;</code>

        <code>&lt;p&gt;&lt;a href=&quot;#&quot; class=&quot;d-inline-flex focus-ring focus-ring-dark py-1 px-2 text-decoration-none border rounded-2&quot;&gt;Dark focus&lt;/a&gt;&lt;/p&gt;</code>/pre>
                                            </div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>

        <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
