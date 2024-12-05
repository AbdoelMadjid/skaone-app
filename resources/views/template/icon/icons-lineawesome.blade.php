@extends('layouts.master')
@section('title')
    @lang('translation.line-awesome')
@endsection
@section('content')
@component('layouts.breadcrumb')
@slot('li_1')
    @lang('translation.components')
@endslot
@slot('li_2')
    @lang('translation.icons')
@endslot
@endcomponent
    <div class="row icon-demo-content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Examples</h4>
                    <p class="text-muted mb-0">Use <code>&lt;i class="lab la-*-*">&lt;/i></code> class.</p>
                </div>
                <div class="card-body">
                    <h6 class="text-uppercase text-muted fw-semibold">Accessibility</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-accessible-icon"></i> lab la-accessible-icon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-american-sign-language-interpreting"></i> las
                            la-american-sign-language-interpreting
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-assistive-listening-systems"></i> las la-assistive-listening-systems
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-audio-description"></i> las la-audio-description
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blind"></i> las la-blind
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-braille"></i> las la-braille
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-closed-captioning"></i> las la-closed-captioning
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-deaf"></i> las la-deaf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-low-vision"></i> las la-low-vision
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-volume"></i> las la-phone-volume
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-question-circle"></i> las la-question-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign-language"></i> las la-sign-language
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tty"></i> las la-tty
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-universal-access"></i> las la-universal-acces
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wheelchair"></i> las la-wheelchair
                        </div>
                    </div>
                    <!-- end row -->

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Alert</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell-slash"></i> las la-bell-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation"></i> las la-exclamation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation-circle"></i> las la-exclamation-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation-triangle"></i> las la-exclamation-triangle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation"></i> las la-radiation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation-alt"></i> las la-radiation-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skull-crossbones"></i> las la-skull-crossbones
                        </div>
                    </div>
                    <!-- end row -->

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Animals</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cat"></i> las la-cat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crow"></i> las la-crow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dog"></i> las la-dog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dove"></i> las la-dove
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dragon"></i> las la-dragon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-feather"></i> las la-feather
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-feather-alt"></i> las la-feather-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fish"></i> las la-fish
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frog"></i> las la-frog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hippo"></i> las la-hippo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-horse"></i> las la-horse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-horse-head"></i> las la-horse-head
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-kiwi-bird"></i> las la-kiwi-bird
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-otter"></i> las la-otter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paw"></i> las la-paw
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-spider"></i> las la-spider
                        </div>
                    </div>
                    <!-- end row -->

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Arrows</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-double-down"></i>las la-angle-double-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-double-left"></i>las la-angle-double-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-double-right"></i>las la-angle-double-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-double-up"></i>las la-angle-double-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-down"></i>las la-angle-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-left"></i>las la-angle-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-right"></i>las la-angle-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angle-up"></i>las la-angle-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-alt-circle-down"></i>las la-arrow-alt-circle-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-alt-circle-left"></i>las la-arrow-alt-circle-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-alt-circle-right"></i>las la-arrow-alt-circle-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-alt-circle-up"></i>las la-arrow-alt-circle-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-circle-down"></i> las la-arrow-circle-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-circle-left"></i> las la-arrow-circle-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-circle-right"></i> las la-arrow-circle-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-circle-up"></i> las la-arrow-circle-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-down"></i> las la-arrow-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-left"></i> las la-arrow-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-right"></i> las la-arrow-righ
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrow-up"></i> las la-arrow-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrows-alt"></i> las la-arrows-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrows-alt-h"></i> las la-arrows-alt-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-arrows-alt-v"></i> las la-arrows-alt-v
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-down"></i> las la-caret-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-left"></i> las la-caret-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-right"></i> las la-caret-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-square-down"></i> las la-caret-square-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-square-left"></i> las la-caret-square-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-square-right"></i> las la-caret-square-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-square-up"></i> las la-caret-square-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-caret-up"></i> las la-caret-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cart-arrow-down"></i> las la-cart-arrow-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chart-line"></i> las la-chart-line
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-circle-down"></i> las la-chevron-circle-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-circle-left"></i> las la-chevron-circle-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-circle-right"></i> las la-chevron-circle-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-circle-up"></i> las la-chevron-circle-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-down"></i> las la-chevron-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-left"></i> las la-chevron-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-right"></i> las la-chevron-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chevron-up"></i> las la-chevron-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-download-alt"></i> las la-cloud-download-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-upload-alt"></i> las la-cloud-upload-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compress-arrows-alt"></i> las la-compress-arrows-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-download"></i> las la-download
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exchange-alt"></i> las la-exchange-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-expand-arrows-alt"></i> las la-expand-arrows-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-external-link-alt"></i> las la-external-link-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-external-link-square-alt"></i> las la-external-link-square-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-down"></i> las la-hand-point-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-left"></i> las la-hand-point-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-right"></i> las la-hand-point-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-up"></i> las la-hand-point-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-pointer"></i> las la-hand-pointer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-history"></i> las la-history
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-level-down-alt"></i> las la-level-down-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-level-up-alt"></i> las la-level-up-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-location-arrow"></i> las la-location-arrow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-long-arrow-alt-down"></i> las la-long-arrow-alt-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-long-arrow-alt-left"></i> las la-long-arrow-alt-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-long-arrow-alt-right"></i> las la-long-arrow-alt-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-long-arrow-alt-up"></i> las la-long-arrow-alt-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mouse-pointer"></i> las la-mouse-pointer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-play"></i> las la-play
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-random"></i> las la-random
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-recycle"></i> las la-recycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-redo"></i> las la-redo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-redo-alt"></i> las la-redo-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-reply"></i> las la-reply
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-reply-all"></i> las la-reply-all
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-retweet"></i> las la-retweet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share"></i> las la-share
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share-square"></i> las la-share-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign-in-alt"></i> las la-sign-in-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign-out-alt"></i> las la-sign-out-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort"></i> las la-sort
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-down"></i> las la-sort-alpha-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-down-alt"></i> las la-sort-alpha-down-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-up"></i> las la-sort-alpha-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-up-alt"></i> las la-sort-alpha-up-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-amount-down"></i> las la-sort-amount-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-amount-down-alt"></i> las la-sort-amount-down-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-amount-up"></i> las la-sort-amount-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-amount-up-alt"></i> las la-sort-amount-up-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-down"></i> las la-sort-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-numeric-down"></i> las la-sort-numeric-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-numeric-down-alt"></i> las la-sort-numeric-down-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-numeric-up"></i> las la-sort-numeric-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-numeric-up-alt"></i> las la-sort-numeric-up-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-up"></i> las la-sort-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync"></i> las la-sync
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync-alt"></i> las la-sync-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-text-height"></i> las la-text-height
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-text-width"></i> las la-text-width
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-undo"></i> las la-undo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-undo-alt"></i> las la-undo-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-upload"></i> las la-upload
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Audio & Video</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-audio-description"></i> las la-audio-description
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-backward"></i> las la-backward
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-broadcast-tower"></i> las la-broadcast-tower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-circle"></i> las la-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-closed-captioning"></i> las la-closed-captioning
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compress"></i> las la-compress
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compress-arrows-alt"></i> las la-compress-arrows-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eject"></i> las la-eject
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-expand"></i> las la-expand
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-expand-arrows-alt"></i> las la-expand-arrows-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fast-backward"></i> las la-fast-backward
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fast-forward"></i> las la-fast-forward
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-audio"></i> las la-file-audio
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-video"></i> las la-file-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-film"></i> las la-film
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-forward"></i> las la-forward
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headphones"></i> las la-headphones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone"></i> las la-microphone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt"></i> las la-microphone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt-slash"></i> las la-microphone-alt-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-slash"></i> las la-microphone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-music"></i> las la-music
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pause"></i> las la-pause
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pause-circle"></i> las la-pause-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-volume"></i> las la-phone-volume
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-photo-video"></i> las la-photo-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-play"></i> las la-play
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-play-circle"></i> las la-play-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-podcast"></i> las la-podcast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-random"></i> las la-random
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-redo"></i> las la-redo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-redo-alt"></i> las la-redo-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rss"></i> las la-rss
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rss-square"></i> las la-rss-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-step-backward"></i> las la-step-backward
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-step-forward"></i> las la-step-forward
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stop"></i> las la-stop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stop-circle"></i> las la-stop-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync"></i> las la-sync
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync-alt"></i> las la-sync-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tv"></i> las la-tv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-undo"></i> las la-undo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-undo-alt"></i> las la-undo-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-video"></i> las la-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-down"></i> las la-volume-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-mute"></i> las la-volume-mute
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-off"></i> las la-volume-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-up"></i> las la-volume-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-youtube"></i> lab la-youtube
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Automotive</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-air-freshener"></i> las la-air-freshener
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ambulance"></i> las la-ambulance
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bus"></i> las la-bus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bus-alt"></i> las la-bus-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car"></i> las la-car
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car-alt"></i> las la-car-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car-battery"></i> las la-car-battery
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car-crash"></i> las la-car-crash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car-side"></i> las la-car-side
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-charging-station"></i> las la-charging-station
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gas-pump"></i> las la-gas-pump
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-motorcycle"></i> las la-motorcycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-oil-can"></i> las la-oil-can
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shuttle-van"></i> las la-shuttle-van
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tachometer-alt"></i> las la-tachometer-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-taxi"></i> las la-taxi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck"></i> las la-truck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck-monster"></i> las la-truck-monster
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck-pickup"></i> las la-truck-pickup
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Autumn</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-apple-alt"></i> las la-apple-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-campground"></i> las la-campground
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-sun"></i> las la-cloud-sun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drumstick-bite"></i> las la-drumstick-bite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-football-ball"></i> las la-football-ball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hiking"></i> las la-hiking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mountain"></i> las la-mountain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tractor"></i> las la-tractor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tree"></i> las la-tree
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wind"></i> las la-wind
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-bottle"></i> las la-wine-bottle
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Beverage</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-beer"></i> las la-beer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blender"></i> las la-blender
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cocktail"></i> las la-cocktail
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coffee"></i> las la-coffee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flask"></i> las la-flask
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-cheers"></i> las la-glass-cheers
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini"></i> las la-glass-martini
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini-alt"></i> las la-glass-martini-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-whiskey"></i> las la-glass-whiskey
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mug-hot"></i> las la-mug-hot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-bottle"></i> las la-wine-bottle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-glass"></i> las la-wine-glas
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-glass-alt"></i>las la-wine-glass-alt
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Brand Icons</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-500px"></i> lab la-500px
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-accusoft"></i> lab la-accusoft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-adn"></i> lab la-adn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-adobe"></i> lab la-adobe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-adversal"></i> lab la-adversa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-affiliatetheme"></i> lab la-affiliatetheme
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-airbnb"></i> lab la-airbnb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-algolia"></i> lab la-algolia
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-amazon"></i> lab la-amazon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-amilia"></i> lab la-amilia
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-android"></i> lab la-android
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-angellist"></i> lab la-angellist
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-angrycreative"></i> lab la-angrycreative
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-angular"></i> lab la-angular
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-app-store"></i> lab la-app-store
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-app-store-ios"></i> lab la-app-store-ios
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-apper"></i> lab la-apper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-apple"></i> lab la-apple
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-artstation"></i> lab la-artstation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-asymmetrik"></i> lab la-asymmetrik
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-atlassian"></i> lab la-atlassian
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-audible"></i> lab la-audible
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-autoprefixer"></i> lab la-autoprefixer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-avianex"></i> lab la-avianex
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-aviato"></i> lab la-aviato
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-aws"></i> lab la-aws
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bandcamp"></i> lab la-bandcamp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-battle-net"></i> lab la-battle-net
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-behance"></i> lab la-behance
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-behance-square"></i> lab la-behance-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bimobject"></i> lab la-bimobject
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bitbucket"></i> lab la-bitbucket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bity"></i> lab la-bity
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-black-tie"></i> lab la-black-tie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-blackberry"></i> lab la-blackberry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-blogger"></i> lab la-blogger
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-blogger-b"></i> lab la-blogger-b
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bootstrap"></i> lab la-bootstrap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buffer"></i> lab la-buffer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buromobelexperte"></i> lab la-buromobelexperte
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buy-n-large"></i> lab la-buy-n-large
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buysellads"></i> lab la-buysellads
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-canadian-maple-leaf"></i> lab la-canadian-maple-leaf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-centercode"></i> lab la-centercode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-centos"></i> lab la-centos
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-chrome"></i> lab la-chrome
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-chromecast"></i> lab la-chromecast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cloudscale"></i> lab la-cloudscale
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cloudsmith"></i> lab la-cloudsmith
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cloudversify"></i> lab la-cloudversify
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-codepen"></i> lab la-codepen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-codiepie"></i> lab la-codiepie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-confluence"></i> lab la-confluence
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-connectdevelop"></i> lab la-connectdevelop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-contao"></i> lab la-contao
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cotton-bureau"></i> lab la-cotton-bureau
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cpanel"></i> lab la-cpanel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons"></i>lab la-creative-commons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-by"></i>lab la-creative-commons-by
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nc"></i>lab la-creative-commons-nc
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nc-eu"></i>lab la-creative-commons-nc-eu
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nc-jp"></i>lab la-creative-commons-nc-jp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nd"></i>lab la-creative-commons-nd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-pd"></i>lab la-creative-commons-pd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-pd-alt"></i>lab la-creative-commons-pd-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-remix"></i>lab la-creative-commons-remix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-sa"></i>lab la-creative-commons-sa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-sampling"></i>lab la-creative-commons-sampling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-sampling-plus"></i>lab la-creative-commons-sampling-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-share"></i>lab la-creative-commons-share
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-zero"></i>lab la-creative-commons-zero
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-css3"></i> lab la-css3
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-css3-alt"></i> lab la-css3-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cuttlefish"></i> lab la-cuttlefish
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dashcube"></i> lab la-dashcube
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-delicious"></i> lab la-delicious
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-deploydog"></i> lab la-deploydog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-deskpro"></i> lab la-deskpro
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dev"></i> lab la-dev
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-deviantart"></i> lab la-deviantart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dhl"></i> lab la-dhl
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-diaspora"></i> lab la-diaspora
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-digg"></i> lab la-digg
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-digital-ocean"></i> lab la-digital-ocean
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-discord"></i> lab la-discord
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-discourse"></i> lab la-discourse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dochub"></i> lab la-dochub
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-docker"></i> lab la-docker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-draft2digital"></i> lab la-draft2digital
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dribbble"></i> lab la-dribbble
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dribbble-square"></i> lab la-dribbble-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dropbox"></i> lab la-dropbox
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-drupal"></i> lab la-drupal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dyalog"></i> lab la-dyalog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-earlybirds"></i> lab la-earlybirds
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ebay"></i> lab la-ebay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-edge"></i> lab la-edge
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-elementor"></i> lab la-elementor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ello"></i> lab la-ello
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ember"></i> lab la-ember
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-empire"></i> lab la-empire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-envira"></i> lab la-envira
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-erlang"></i> lab la-erlang
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-etsy"></i> lab la-etsy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-evernote"></i> lab la-evernote
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-expeditedssl"></i> lab la-expeditedssl
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook"></i> lab la-facebook
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook-f"></i> lab la-facebook-k
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook-messenger"></i> lab la-facebook-messenger
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook-square"></i> lab la-facebook-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fedex"></i> lab la-fedex
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fedora"></i> lab la-fedora
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-figma"></i> lab la-figma
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-firefox"></i> lab la-firefox
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-first-order"></i> lab la-first-order
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-first-order-alt"></i> lab la-first-order-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-firstdraft"></i> lab la-firstdraft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-flickr"></i> lab la-flickr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-flipboard"></i> lab la-flipboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fly"></i> lab la-fly
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-font-awesome"></i> lab la-font-awesome
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-font-awesome-alt"></i> lab la-font-awesome-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-font-awesome-flag"></i> lab la-font-awesome-flog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fonticons"></i> lab la-fonticons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fonticons-fi"></i> lab la-fonticons-fi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fort-awesome"></i> lab la-fort-awesome
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fort-awesome-alt"></i> lab la-fort-awesome-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-forumbee"></i> lab la-forumbee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-foursquare"></i> lab la-foursquare
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-free-code-camp"></i> lab la-free-code-camp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-freebsd"></i> lab la-freebsd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fulcrum"></i> lab la-fulcrum
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-get-pocket"></i> lab la-get-pocket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-git"></i> lab la-git
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-git-alt"></i>lab la-git-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-git-square"></i> lab la-git-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-github"></i>lab la-github
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-github-alt"></i>lab la-github-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-github-square"></i>lab la-github-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gitkraken"></i>lab la-gitkraken
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gitlab"></i> lab la-gitlab
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gitter"></i> lab la-gitter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-glide"></i> lab la-glide
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-glide-g"></i> lab la-glide-g
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gofore"></i> lab la-gofore
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-goodreads"></i> lab la-goodreads
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-goodreads-g"></i> lab la-goodreads-v
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google"></i> lab la-google
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-drive"></i>lab la-google-drive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-play"></i>lab la-google-play
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-plus"></i>lab la-google-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-plus-g"></i>lab la-google-plus-g
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-plus-square"></i>lab la-google-plus-squar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gratipay"></i> lab la-gratipay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-grav"></i> lab la-grav
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gripfire"></i> lab la-gripfire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-grunt"></i> lab la-grunt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gulp"></i> lab la-gulp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hacker-news"></i> lab la-hacker-news
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hacker-news-square"></i> lab la-hacker-news-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hackerrank"></i> lab la-hackerrank
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hips"></i> lab la-hips
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hire-a-helper"></i> lab la-hire-a-helper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hooli"></i> lab la-hooli
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hornbill"></i> lab la-hornbill
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hotjar"></i> lab la-hotjar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-houzz"></i> lab la-houzz
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-html5"></i> lab la-html5
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hubspot"></i> lab la-hubspot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-imdb"></i> lab la-imdb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-instagram"></i> lab la-instagram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-intercom"></i> lab la-intercom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-internet-explorer"></i> lab la-internet-explorer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-invision"></i> lab la-invisio
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ioxhost"></i> lab la-ioxhost
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-itch-io"></i> lab la-itch-io
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-itunes"></i> lab la-itunes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-itunes-note"></i> lab la-itunes-note
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-java"></i> lab la-java
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-jenkins"></i> lab la-jenkins
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-jira"></i> lab la-jira
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-joget"></i> lab la-joget
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-joomla"></i> lab la-joomla
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-js"></i> lab la-js
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-js-square"></i> lab la-js-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-jsfiddle"></i> lab la-jsfiddle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-kaggle"></i> lab la-kaggle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-keybase"></i> lab la-keybase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-keycdn"></i> lab la-keycdn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-kickstarter"></i> lab la-kickstarter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-kickstarter-k"></i> lab la-kickstarter-
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-korvue"></i> lab la-korvue
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-laravel"></i> lab la-laravel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-lastfm"></i> lab la-lastfm
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-lastfm-square"></i> lab la-lastfm-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-leanpub"></i> lab la-leanpub
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-less"></i> lab la-less
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-line"></i> lab la-line
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linkedin"></i> lab la-linkedin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linkedin-in"></i> lab la-linkedin-in
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linode"></i> lab la-linode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linux"></i> lab la-linux
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-lyft"></i> lab la-lyft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-magento"></i> lab la-magento
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mailchimp"></i> lab la-mailchimp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mandalorian"></i> lab la-mandalorian
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-markdown"></i> lab la-markdown
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mastodon"></i> lab la-mastodon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-maxcdn"></i> lab la-maxcdn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mdb"></i> lab la-mdb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medapps"></i> lab la-medapps
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medium"></i> lab la-medium
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medium-m"></i> lab la-medium-m
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medrt"></i> lab la-medrt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-meetup"></i> lab la-meetup
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-megaport"></i> lab la-megaport
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mendeley"></i> lab la-mendeley
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-microsoft"></i> lab la-microsoft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mix"></i> lab la-mix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mixcloud"></i> lab la-mixclou
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mizuni"></i> lab la-mizuni
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-modx"></i> lab la-modx
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-monero"></i> lab la-monero
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-neos"></i> lab la-neos
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-nimblr"></i> lab la-nimblr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-node"></i> lab la-node
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-node-js"></i> lab la-node-js
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-npm"></i> lab la-npm
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ns8"></i> lab la-ns8
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-nutritionix"></i> lab la-nutritionix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-odnoklassniki"></i> lab la-odnoklassniki
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-odnoklassniki-square"></i> lab la-odnoklassniki-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-opencart"></i> lab la-opencart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-openid"></i> lab la-openid
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-opera"></i> lab la-opera
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-optin-monster"></i> lab la-optin-monster
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-orcid"></i> lab la-orcid
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-osi"></i> lab la-osi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-page4"></i> lab la-page4
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pagelines"></i> lab la-pagelines
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-palfed"></i> lab la-palfed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-patreon"></i> lab la-patreon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-periscope"></i> lab la-periscope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-phabricator"></i> lab la-phabricator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-phoenix-framework"></i> lab la-phoenix-framework
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-phoenix-squadron"></i> lab la-phoenix-squadron
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-php"></i> lab la-php
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper"></i> lab la-pied-piper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper-alt"></i> lab la-pied-piper-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper-hat"></i> lab la-pied-piper-hat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper-pp"></i> lab la-pied-piper-pp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pinterest"></i> lab la-pinterest
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pinterest-p"></i> lab la-pinterest-p
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pinterest-square"></i> lab la-pinterest-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-product-hunt"></i> lab la-product-hunt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pushed"></i> lab la-pushed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-python"></i> lab la-python
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-qq"></i> lab la-qq
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-quinscape"></i> lab la-quinscape
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-quora"></i> lab la-quora
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-r-project"></i> lab la-r-project
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-raspberry-pi"></i> lab la-raspberry-p
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ravelry"></i> lab la-ravelry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-react"></i> lab la-react
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reacteurope"></i> lab la-reacteurope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-readme"></i> lab la-readme
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rebel"></i> lab la-rebel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-red-river"></i> lab la-red-river
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reddit"></i> lab la-reddit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reddit-alien"></i>lab la-reddit-alien
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reddit-square"></i>lab la-reddit-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-redhat"></i>lab la-redhat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-renren"></i>lab la-renren
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-researchgate"></i> lab la-researchgate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-resolving"></i> lab la-resolving
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rev"></i> lab la-rev
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rocketchat"></i> lab la-rocketchat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rockrms"></i> lab la-rockrms
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-safari"></i> lab la-safari
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-salesforce"></i> lab la-salesforce
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sass"></i> lab la-sass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-schlix"></i> lab la-schlix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-scribd"></i> lab la-scribd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-searchengin"></i> lab la-searchengin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sellcast"></i> lab la-sellcast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sellsy"></i> lab la-sells
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-servicestack"></i> lab la-servicestack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-shirtsinbulk"></i> lab la-shirtsinbulk
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-shopware"></i> lab la-shopware
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-simplybuilt"></i> lab la-simplybuilt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sith"></i> lab la-sith
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sketch"></i> lab la-sketch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-skyatlas"></i> lab la-skyatlas
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-skype"></i> lab la-skype
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-slack"></i> lab la-slack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-slack-hash"></i> lab la-slack-has
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-slideshare"></i> lab la-slideshare
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-snapchat"></i> lab la-snapchat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-snapchat-ghost"></i> lab la-snapchat-ghos
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-snapchat-square"></i> lab la-snapchat-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sourcetree"></i> lab la-sourcetree
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-speakap"></i> lab la-speakap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-speaker-deck"></i> lab la-speaker-deck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-squarespace"></i> lab la-squarespace
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stack-exchange"></i> lab la-stack-exchange
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stack-overflow"></i> lab la-stack-overflow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stackpath"></i> lab la-stackpath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-staylinked"></i> lab la-staylinked
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sticker-mule"></i> lab la-sticker-mule
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-strava"></i> lab la-strava
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-studiovinari"></i> lab la-studiovinari
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stumbleupon"></i> lab la-stumbleupon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stumbleupon-circle"></i> lab la-stumbleupon-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-superpowers"></i> lab la-superpowers
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-supple"></i> lab la-supple
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-suse"></i> lab la-suse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-swift"></i> lab la-swift
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-symfony"></i> lab la-symfony
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-teamspeak"></i> lab la-teamspeak
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-telegram"></i> lab la-telegram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-telegram-plane"></i> lab la-telegram-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tencent-weibo"></i> lab la-tencent-weibo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-the-red-yeti"></i> lab la-the-red-yeti
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-themeco"></i> lab la-themeco
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-themeisle"></i> lab la-themeisle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-think-peaks"></i> lab la-think-peaks
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-trade-federation"></i> lab la-trade-federation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-trello"></i> lab la-trello
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tripadvisor"></i> lab la-tripadvisor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tumblr"></i> lab la-tumblr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tumblr-square"></i> lab la-tumblr-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-twitter"></i>lab la-twitter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-twitter-square"></i>lab la-twitter-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-typo3"></i> lab la-typo3
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-uber"></i> lab la-uber
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ubuntu"></i> lab la-ubuntu
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-uikit"></i> lab la-uikit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-umbraco"></i> lab la-umbraco
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-uniregistry"></i> lab la-uniregistry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-untappd"></i> lab la-untappd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ups"></i> lab la-ups
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-usb"></i> lab la-usb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-usps"></i> lab la-usps
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ussunnah"></i> lab la-ussunnah
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vaadin"></i> lab la-vaadin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viacoin"></i> lab la-viacoin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viadeo"></i> lab la-viadeo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viadeo-square"></i> lab la-viadeo-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viber"></i> lab la-viber
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vimeo"></i> lab la-vimeo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vimeo-square"></i> lab la-vimeo-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vimeo-v"></i> lab la-vimeo-v
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vine"></i> lab la-vine
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vk"></i> lab la-vk
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vnv"></i> lab la-vnv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vuejs"></i> lab la-vuejs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-waze"></i> lab la-waze
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-weebly"></i> lab la-weebly
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-weibo"></i> lab la-weibo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-weixin"></i> lab la-weixin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-whatsapp"></i> lab la-whatsapp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-whatsapp-square"></i> lab la-whatsapp-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-whmcs"></i> lab la-whmcs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wikipedia-w"></i> lab la-wikipedia-w
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-windows"></i> lab la-windows
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wix"></i> lab la-wix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wolf-pack-battalion"></i> lab la-wolf-pack-battalion
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wordpress"></i> lab la-wordpress
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wordpress-simple"></i> lab la-wordpress-simple
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpbeginner"></i> lab la-wpbeginner
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpexplorer"></i> lab la-wpexplorer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpforms"></i> lab la-wpforms
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpressr"></i> lab la-wpressr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-xing"></i> lab la-xing
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-xing-square"></i> lab la-xing-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-y-combinator"></i> lab la-y-combinator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yahoo"></i> lab la-yahoo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yammer"></i> lab la-yammer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yandex"></i> lab la-yandex
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yandex-international"></i> lab la-yandex-international
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yarn"></i> lab la-yarn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yelp"></i> lab la-yelp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yoast"></i> lab la-yoast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-youtube-square"></i> lab la-youtube-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-zhihu"></i> lab la-zhihu
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Buildings</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-archway"></i> las la-archway
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-building"></i> las la-building
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-campground"></i> las la-campgroun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-church"></i> las la-church
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-city"></i> las la-city
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clinic-medical"></i> las la-clinic-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dungeon"></i> las la-dungeon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gopuram"></i> las la-gopuram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-home"></i> las la-home
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital"></i> las la-hospital
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital-alt"></i> las la-hospital-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hotel"></i> las la-hotel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-house-damage"></i> las la-house-damage
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-igloo"></i> las la-igloo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-industry"></i> las la-industry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-kaaba"></i> las la-kaaba
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-landmark"></i> las la-landmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-monument"></i> las la-monument
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mosque"></i> las la-mosque
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-place-of-worship"></i> las la-place-of-worship
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-school"></i> las la-school
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-store"></i> las la-store
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-store-alt"></i> las la-store-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-synagogue"></i> las la-synagogue
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-torii-gate"></i> las la-torii-gate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-university"></i> las la-university
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vihara"></i> las la-vihara
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-warehouse"></i> las la-warehouse
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Business</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-address-book"></i> las la-address-book
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-address-card"></i> las la-address-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-archive"></i> las la-archive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale"></i> las la-balance-scale
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-left"></i> las la-balance-scale-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-right"></i> las la-balance-scale-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-birthday-cake"></i> las la-birthday-cake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book"></i> las la-book
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-briefcase"></i> las la-briefcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-building"></i> las la-building
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullhorn"></i> las la-bullhorn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullseye"></i> las la-bullseye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-business-time"></i> las la-business-tim
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calculator"></i> las la-calculator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar"></i> las la-calendar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-alt"></i> las la-calendar-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-certificate"></i> las la-certificate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chart-area"></i> las la-chart-area
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chart-bar"></i> las la-chart-ba
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chart-line"></i> las la-chart-line
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chart-pie"></i> las la-chart-pie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-city"></i> las la-city
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clipboard"></i> las la-clipboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coffee"></i> las la-coffee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-columns"></i> las la-columns
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compass"></i> las la-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-copy"></i> las la-copy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-copyright"></i> las la-copyright
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cut"></i> las la-cut
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-edit"></i> las la-edit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope"></i> las la-envelop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope-open"></i> las la-envelope-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope-square"></i> las la-envelope-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eraser"></i> las la-eraser
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fax"></i> las la-fax
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-alt"></i> las la-file-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder"></i> las la-folder
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder-minus"></i> las la-folder-minus"
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder-open"></i> las la-folder-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder-plus"></i> las la-folder-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glasses"></i> las la-glasses
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe"></i> las la-globe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-highlighter"></i> las la-highlighter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-industry"></i> las la-industry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-landmark"></i> las la-landmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-marker"></i> las la-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paperclip"></i> las la-paperclip
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paste"></i> las la-paste
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen"></i> las la-pen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-alt"></i> las la-pen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-fancy"></i> las la-pen-fancy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-nib"></i> las la-pen-nib
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-square"></i> las la-pen-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pencil-alt"></i> las la-pencil-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-percent"></i> las la-percent
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone"></i> las la-phone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-alt"></i> las la-phone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-slash"></i> las la-phone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-square"></i> las la-phone-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-square-alt"></i> las la-phone-square-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-volume"></i> las la-phone-volume
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-print"></i> las la-print
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-project-diagram"></i> las la-project-diagram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-registered"></i> las la-registered
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-save"></i> las la-save
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sitemap"></i> las la-sitemap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-socks"></i> las la-socks
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sticky-note"></i> las la-sticky-not
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stream"></i> las la-stream
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-table"></i> las la-table
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tag"></i> las la-tag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tags"></i> las la-tags
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tasks"></i> las la-tasks
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbtack"></i> las la-thumbtack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trademark"></i> las la-trademark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wallet"></i> las la-wallet
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Camping</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-binoculars"></i> las la-binoculars
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-campground"></i> las la-campground
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compass"></i> las la-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire"></i> las la-fire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6"> las la-fire-alt
                            <i class="las la-fire-alt"></i>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-first-aid"></i> las la-first-aid
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frog"></i> las la-frog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hiking"></i> las la-hiking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map"></i> las la-map
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marked"></i> las la-map-marked
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-signs"></i> las la-map-signs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mountain"></i> las la-mountain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-route"></i> las la-route
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toilet-paper"></i> las la-toilet-paper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tree"></i> las la-tree
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Charity</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dollar-sign"></i> las la-dollar-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-donate"></i> las la-donate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dove"></i> las la-dove
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gift"></i> las la-gift
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe"></i> las la-globe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-holding-heart"></i> las la-hand-holding-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-holding-usd"></i> las la-hand-holding-usd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hands-helping"></i> las la-hands-helping
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-handshake"></i> las la-handshake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-leaf"></i> las la-leaf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-parachute-box"></i> las la-parachute-box
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-piggy-bank"></i> las la-piggy-bank
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ribbon"></i> las la-ribbon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-seedling"></i> las la-seedling
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Chat</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment"></i> las la-comment
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-alt"></i> las la-comment-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-dots"></i> las la-comment-dots
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-medical"></i> las la-comment-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-slash"></i> las la-comment-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comments"></i> las la-comments
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frown"></i> las la-frown
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-icons"></i> las la-icons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-meh"></i> las la-meh
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone"></i> las la-phone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-alt"></i> las la-phone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-slash"></i> las la-phone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poo"></i> las la-poo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quote-left"></i> las la-quote-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quote-right"></i> las la-quote-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smile"></i> las la-smile
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sms"></i> las la-sms
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-video"></i> las la-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-video-slash"></i> las la-video-slash
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Chess</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess"></i> las la-chess
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-bishop"></i> las la-chess-bishop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-board"></i> las la-chess-board
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-king"></i> las la-chess-king
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-knight"></i> las la-chess-knight
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-pawn"></i> las la-chess-pawn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-queen"></i> las la-chess-queen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-rook"></i> las la-chess-rook
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-square-full"></i> las la-square-full
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Childhood</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-apple-alt"></i> las la-apple-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-baby"></i> las la-baby
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-baby-carriage"></i> las la-baby-carriage
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bath"></i> las la-bath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-biking"></i> las la-biking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-birthday-cake"></i> las la-birthday-cake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cookie"></i> las la-cookie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cookie-bite"></i> las la-cookie-bite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gamepad"></i> las la-gamepad
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ice-cream"></i> las la-ice-cream
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mitten"></i> las la-mitten
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-robot"></i> las la-robot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-school"></i> las la-school
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shapes"></i> las la-shapes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowman"></i> las la-snowman
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Clothing</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-graduation-cap"></i> las la-graduation-cap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hat-cowboy"></i> las la-hat-cowboy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hat-cowboy-side"></i> las la-hat-cowboy-side
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hat-wizard"></i> las la-hat-wizard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mitten"></i> las la-mitten
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shoe-prints"></i> las la-shoe-prints
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-socks"></i> las la-socks
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tshirt"></i> las la-tshirt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-tie"></i> las la-user-tie
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Code</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-archive"></i> las la-archive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-barcode"></i> las la-barcode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bath"></i> las la-bath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bug"></i> las la-bug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-code"></i> las la-code
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-code-branch"></i> las la-code-branch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coffee"></i> las la-coffee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-alt"></i> las la-file-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-code"></i> las la-file-code
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-filter"></i> las la-filter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire-extinguisher"></i> las la-fire-extinguisher
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder"></i> las la-folder
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder-open"></i> las la-folder-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-keyboard"></i> las la-keyboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-laptop-code"></i> las la-laptop-code
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microchip"></i> las la-microchip
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-project-diagram"></i> las la-project-diagram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-qrcode"></i> las la-qrcode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shield-alt"></i> las la-shield-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sitemap"></i> las la-sitemap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stream"></i> las la-stream
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-terminal"></i> las la-terminal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-secret"></i> las la-user-secret
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-window-close"></i> las la-window-close
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-window-maximize"></i> las la-window-maximize
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-window-minimize"></i> las la-window-minimize
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-window-restore"></i> las la-window-restore
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Communication</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-address-book"></i> las la-address-book
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-address-card"></i> las la-address-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-american-sign-language-interpreting"></i> las
                            la-american-sign-language-interpreting
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-assistive-listening-systems"></i> las la-assistive-listening-systems
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-at"></i> las la-at
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell-slash"></i> las la-bell-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bluetooth"></i> lab la-bluetooth
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bluetooth-b"></i> lab la-bluetooth-b
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-broadcast-tower"></i> las la-broadcast-tower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullhorn"></i> las la-bullhorn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chalkboard"></i> las la-chalkboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment"></i> las la-comment
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-alt"></i> las la-comment-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comments"></i> las la-comments
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope"></i> las la-envelope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope-open"></i> las la-envelope-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope-square"></i> las la-envelope-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fax"></i> las la-fax
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-inbox"></i> las la-inbox
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-language"></i> las la-language
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone"></i> las la-microphone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt"></i> las la-microphone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt-slash"></i> las la-microphone-alt-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-slash"></i> las la-microphone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mobile"></i> las la-mobile
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mobile-alt"></i> las la-mobile-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paper-plane"></i> las la-paper-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone"></i> las la-phone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-alt"></i> las la-phone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-slash"></i> las la-phone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-square"></i> las la-phone-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-square-alt"></i> las la-phone-square-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-volume"></i> las la-phone-volume
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rss"></i> las la-rss
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rss-square"></i> las la-rss-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tty"></i> las la-tty
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-voicemail"></i> las la-voicemail
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wifi"></i> las la-wifi
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Computers</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-database"></i> las la-database
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-desktop"></i> las la-desktop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-download"></i> las la-download
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ethernet"></i> las la-ethernet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hdd"></i> las la-hdd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headphones"></i> las la-headphones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-keyboard"></i> las la-keyboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-laptop"></i> las la-laptop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-memory"></i> las la-memory
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microchip"></i> las la-microchip
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mobile"></i> las la-mobile
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mobile-alt"></i> las la-mobile-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mouse"></i> las la-mouse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plug"></i> las la-plug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-power-off"></i> las la-power-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-print"></i> las la-print
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-satellite"></i> las la-satellite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-satellite-dish"></i> las la-satellite-dish
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-save"></i> las la-save
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sd-card"></i> las la-sd-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-server"></i> las la-server
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sim-card"></i> las la-sim-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stream"></i> las la-stream
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tablet"></i> las la-tablet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tablet-alt"></i> las la-tablet-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tv"></i> las la-tv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-upload"></i> las la-upload
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Construction</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-brush"></i> las la-brush
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drafting-compass"></i> las la-drafting-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dumpster"></i> las la-dumpster
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hammer"></i> las la-hammer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hard-hat"></i> las la-hard-hat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paint-roller"></i> las la-paint-roller
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pencil-alt"></i> las la-pencil-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pencil-ruler"></i> las la-pencil-ruler
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler"></i> las la-ruler
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-combined"></i> las la-ruler-combined
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-horizontal"></i> las la-ruler-horizontal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-vertical"></i> las la-ruler-vertical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-screwdriver"></i> las la-screwdriver
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toolbox"></i> las la-toolbox
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tools"></i> las la-tools
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck-pickup"></i> las la-truck-pickup
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wrench"></i> las la-wrench
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Currency</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bitcoin"></i> lab la-bitcoin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-btc"></i> lab la-btc
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dollar-sign"></i> las la-dollar-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ethereum"></i> lab la-ethereum
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-euro-sign"></i> las la-euro-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gg"></i> lab la-gg
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gg-circle"></i> lab la-gg-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hryvnia"></i> las la-hryvnia
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lira-sign"></i> las la-lira-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill"></i> las la-money-bill
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-alt"></i> las la-money-bill-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-wave"></i> las la-money-bill-wave
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-wave-alt"></i> las la-money-bill-wave-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check"></i> las la-money-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check-alt"></i> las la-money-check-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pound-sign"></i> las la-pound-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruble-sign"></i> las la-ruble-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rupee-sign"></i> las la-rupee-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shekel-sign"></i> las la-shekel-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tenge"></i> las la-tenge
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-won-sign"></i> las la-won-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-yen-sign"></i> las la-yen-sign
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Date & Time</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell-slash"></i> las la-bell-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar"></i> las la-calendar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-alt"></i> las la-calendar-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-check"></i> las la-calendar-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-minus"></i> las la-calendar-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-plus"></i> las la-calendar-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-times"></i> las la-calendar-times
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clock"></i> las la-clock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hourglass"></i> las la-hourglass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hourglass-end"></i> las la-hourglass-end
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hourglass-half"></i> las la-hourglass-half
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hourglass-start"></i> las la-hourglass-start
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stopwatch"></i> las la-stopwatch
                        </div>
                    </div>
                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Design</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-adjust"></i> las la-adjust
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bezier-curve"></i> las la-bezier-curve
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-brush"></i> las la-brush
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clone"></i> las la-clone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-copy"></i> las la-copy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crop"></i> las la-crop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crop-alt"></i> las la-crop-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crosshairs"></i> las la-crosshairs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cut"></i> las la-cut
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drafting-compass"></i> las la-drafting-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-draw-polygon"></i> las la-draw-polygon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-edit"></i> las la-edit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eraser"></i> las la-eraser
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye"></i> las la-eye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-dropper"></i> las la-eye-dropper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-slash"></i> las la-eye-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fill"></i> las la-fill
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fill-drip"></i> las la-fill-drip
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-highlighter"></i> las la-highlighter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-icons"></i> las la-icons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-layer-group"></i> las la-layer-group
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-magic"></i> las la-magic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-marker"></i> las la-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-object-group"></i> las la-object-group
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-object-ungroup"></i> las la-object-ungroup
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paint-brush"></i> las la-paint-brush
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paint-roller"></i> las la-paint-roller
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-palette"></i> las la-palette
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paste"></i> las la-paste
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen"></i> las la-pen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-alt"></i> las la-pen-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-fancy"></i> las la-pen-fancy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-nib"></i> las la-pen-nib
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pencil-alt"></i> las la-pencil-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pencil-ruler"></i> las la-pencil-ruler
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-combined"></i> las la-ruler-combined
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-horizontal"></i> las la-ruler-horizontal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-vertical"></i> las la-ruler-vertical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-save"></i> las la-save
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-splotch"></i> las la-splotch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-spray-can"></i> las la-spray-can
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stamp"></i> las la-stamp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swatchbook"></i> las la-swatchbook
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tint"></i> las la-tint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tint-slash"></i> las la-tint-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vector-square"></i> las la-vector-square
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Editors</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-align-center"></i> las la-align-center
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-align-justify"></i> las la-align-justify
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-align-left"></i> las la-align-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-align-right"></i> las la-align-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bold"></i> las la-bold
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-border-all"></i> las la-border-all
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-border-none"></i> las la-border-none
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-border-style"></i> las la-border-style
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clipboard"></i> las la-clipboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clone"></i> las la-clone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-columns"></i> las la-columns
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-copy"></i> las la-copy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cut"></i> las la-cut
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-edit"></i> las la-edit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eraser"></i> las la-eraser
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-alt"></i> las la-file-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-font"></i> las la-font
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glasses"></i> las la-glasses
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heading"></i> las la-heading
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-highlighter"></i> las la-highlighter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-i-cursor"></i> las la-i-cursor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-icons"></i> las la-icons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-indent"></i> las la-indent
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-italic"></i> las la-italic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-link"></i> las la-link
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-list"></i> las la-list
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-list-alt"></i> las la-list-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-list-ol"></i> las la-list-ol
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-list-ul"></i> las la-list-ul
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-marker"></i> las la-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-outdent"></i> las la-outdent
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paper-plane"></i> las la-paper-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paperclip"></i> las la-paperclip
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paragraph"></i> las la-paragraph
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paste"></i> las la-paste
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen"></i> las la-pen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-alt"></i> las la-pen-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-fancy"></i> las la-pen-fancy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-nib"></i> las la-pen-nib
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pencil-alt"></i> las la-pencil-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-print"></i> las la-print
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quote-left"></i> las la-quote-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quote-right"></i> las la-quote-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-reply-all"></i> las la-reply-all
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-screwdriver"></i> las la-screwdriver
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share"></i> las la-share
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-spell-check"></i> las la-spell-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-strikethrough"></i> las la-strikethrough
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-subscript"></i> las la-subscript
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync"></i> las la-sync
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-text-width"></i> las la-text-width
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-th"></i> las la-th
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-th-large"></i> las la-th-large
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-th-list"></i> las la-th-list
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tools"></i> las la-tools
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash"></i> las la-trash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash-alt"></i> las la-trash-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash-restore"></i> las la-trash-restore
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash-restore-alt"></i> las la-trash-restore-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-underline"></i> las la-underline
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6"><i class="las la-undo"></i>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-undo-alt"></i> las la-undo-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-unlink"></i> las la-unlink
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wrench"></i> las la-wrench
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Education</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-apple-alt"></i> las la-apple-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-atom"></i> las la-atom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-award"></i> las la-award
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell-slash"></i> las la-bell-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book-open"></i> las la-book-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book-reader"></i> las la-book-reader
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chalkboard"></i> las la-chalkboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chalkboard-teacher"></i> las la-chalkboard-teacher
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-graduation-cap"></i> las la-graduation-cap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-laptop-code"></i> las la-laptop-code
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microscope"></i> las la-microscope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-music"></i> las la-music
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-school"></i> las la-school
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shapes"></i> las la-shapes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-theater-masks"></i> las la-theater-masks
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-graduate"></i> las la-user-graduate
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Emoji</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-angry"></i> las la-angry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dizzy"></i> las la-dizzy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flushed"></i> las la-flushed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frown"></i> las la-frown
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frown-open"></i> las la-frown-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grimace"></i> las la-grimace
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin"></i> las la-grin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-alt"></i> las la-grin-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-beam"></i> las la-grin-beam
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-beam-sweat"></i> las la-grin-beam-sweat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-hearts"></i> las la-grin-hearts
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-squint"></i> las la-grin-squint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-squint-tears"></i> las la-grin-squint-tears
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-stars"></i> las la-grin-stars
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-tears"></i> las la-grin-tears
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-tongue"></i> las la-grin-tongue
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-tongue-squint"></i> las la-grin-tongue-squint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-tongue-wink"></i> las la-grin-tongue-wink
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grin-wink"></i> las la-grin-wink
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-kiss"></i> las la-kiss
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-kiss-beam"></i> las la-kiss-beam
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-kiss-wink-heart"></i> las la-kiss-wink-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-laugh"></i> las la-laugh
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-laugh-beam"></i> las la-laugh-beam
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-meh-rolling-eyes"></i> las la-meh-rolling-eyes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sad-cry"></i> las la-sad-cry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sad-tear"></i> las la-sad-tear
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smile"></i> las la-smile
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smile-beam"></i> las la-smile-beam
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smile-wink"></i> las la-smile-wink
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-surprise"></i> las la-surprise
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tired"></i> las la-tired
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Energy</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-atom"></i> las la-atom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-empty"></i> las la-battery-empty
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-full"></i> las la-battery-full
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-half"></i> las la-battery-half
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-quarter"></i> las la-battery-quarter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-three-quarters"></i> las la-battery-three-quarters
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-broadcast-tower"></i> las la-broadcast-tower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-burn"></i> las la-burn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-charging-station"></i> las la-charging-station
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire"></i> las la-fire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire-alt"></i> las la-fire-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gas-pump"></i> las la-gas-pump
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-industry"></i> las la-industry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-leaf"></i> las la-leaf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lightbulb"></i> las la-lightbulb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plug"></i> las la-plug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poop"></i> las la-poop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-power-off"></i> las la-power-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation"></i> las la-radiation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation-alt"></i> las la-radiation-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-seedling"></i> las la-seedling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-solar-panel"></i> las la-solar-panel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sun"></i> las la-sun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-water"></i> las la-water
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wind"></i> las la-wind
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Files</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-archive"></i> las la-archive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clone"></i> las la-clone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-copy"></i> las la-copy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cut"></i> las la-cut
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-alt"></i> las la-file-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-archive"></i> las la-file-archive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-audio"></i> las la-file-audio
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-code"></i> las la-file-code
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-excel"></i> las la-file-excel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-image"></i> las la-file-image
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-pdf"></i> las la-file-pdf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-powerpoint"></i> las la-file-powerpoint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-video"></i> las la-file-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-word"></i> las la-file-word
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder"></i> las la-folder
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder-open"></i> las la-folder-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paste"></i> las la-paste
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-photo-video"></i> las la-photo-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-save"></i> las la-save
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sticky-note"></i> las la-sticky-note
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Finance</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale"></i> las la-balance-scale
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-left"></i> las la-balance-scale-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-right"></i> las la-balance-scale-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book"></i> las la-book
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cash-register"></i> las la-cash-register
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chart-line"></i> las la-chart-line
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chart-pie"></i> las la-chart-pie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coins"></i> las la-coins
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-dollar"></i> las la-comment-dollar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comments-dollar"></i> las la-comments-dollar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-credit-card"></i> las la-credit-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-donate"></i> las la-donate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-invoice"></i> las la-file-invoice
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-invoice-dollar"></i> las la-file-invoice-dollar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-holding-usd"></i> las la-hand-holding-usd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-landmark"></i> las la-landmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill"></i> las la-money-bill
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-alt"></i> las la-money-bill-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-wave"></i> las la-money-bill-wave
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-wave-alt"></i> las la-money-bill-wave-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check"></i> las la-money-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check-alt"></i> las la-money-check-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-percentage"></i> las la-percentage
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-piggy-bank"></i> las la-piggy-bank
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-receipt"></i> las la-receipt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stamp"></i> las la-stamp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wallet"></i> las la-wallet
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Fitness</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bicycle"></i> las la-bicycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bacon"></i> las la-bacon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bone"></i> las la-bone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bread-slice"></i> las la-bread-slice
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-candy-cane"></i> las la-candy-cane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-carrot"></i> las la-carrot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cheese"></i> las la-cheese
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-meatball"></i> las la-cloud-meatball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cookie"></i> las la-cookie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drumstick-bite"></i> las la-drumstick-bite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-egg"></i> las la-egg
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fish"></i> las la-fish
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hamburger"></i> las la-hamburger
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hotdog"></i> las la-hotdog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ice-cream"></i> las la-ice-cream
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lemon"></i> las la-lemon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pepper-hot"></i> las la-pepper-hot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pizza-slice"></i> las la-pizza-slice
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-seedling"></i> las la-seedling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stroopwafel"></i> las la-stroopwafel
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Games</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess"></i> las la-chess
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-bishop"></i> las la-chess-bishop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-board"></i> las la-chess-board
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-king"></i> las la-chess-king
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-knight"></i> las la-chess-knight
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-pawn"></i> las la-chess-pawn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-queen"></i> las la-chess-queen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chess-rook"></i> las la-chess-rook
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice"></i> las la-dice
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-d20"></i> las la-dice-d20
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-d6"></i> las la-dice-d6
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-five"></i> las la-dice-five
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-four"></i> las la-dice-four
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-one"></i> las la-dice-one
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-six"></i> las la-dice-six
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-three"></i> las la-dice-three
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-two"></i> las la-dice-two
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gamepad"></i> las la-gamepad
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ghost"></i> las la-ghost
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headset"></i> las la-headset
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-playstation"></i> lab la-playstation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-puzzle-piece"></i> las la-puzzle-piece
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-steam"></i> lab la-steam
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-steam-square"></i> lab la-steam-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-steam-symbol"></i> lab la-steam-symbol
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-twitch"></i> lab la-twitch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-xbox"></i> lab la-xbox
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Genders</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-genderless"></i> las la-genderless
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mars"></i> las la-mars
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mars-double"></i> las la-mars-double
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mars-stroke"></i> las la-mars-stroke
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mars-stroke-h"></i> las la-mars-stroke-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mars-stroke-v"></i> las la-mars-stroke-v
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mercury"></i> las la-mercury
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-neuter"></i> las la-neuter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-transgender"></i> las la-transgender
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-transgender-alt"></i> las la-transgender-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-venus"></i> las la-venus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-venus-double"></i> las la-venus-double
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-venus-mars"></i> las la-venus-mars
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Halloween</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book-dead"></i> las la-book-dead
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-broom"></i> las la-broom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cat"></i> las la-cat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-moon"></i> las la-cloud-moon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crow"></i> las la-crow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ghost"></i> las la-ghost
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hat-wizard"></i> las la-hat-wizard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mask"></i> las la-mask
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skull-crossbones"></i> las la-skull-crossbones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-spider"></i> las la-spider
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toilet-paper"></i> las la-toilet-paper
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Hands</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-allergies"></i> las la-allergies
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fist-raised"></i> las la-fist-raised
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-holding"></i> las la-hand-holding
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-holding-heart"></i> las la-hand-holding-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-holding-usd"></i> las la-hand-holding-usd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-lizard"></i> las la-hand-lizard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-middle-finger"></i> las la-hand-middle-finger
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-paper"></i> las la-hand-paper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-peace"></i> las la-hand-peace
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-down"></i> las la-hand-point-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-left"></i> las la-hand-point-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-right"></i> las la-hand-point-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-point-up"></i> las la-hand-point-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-pointer"></i> las la-hand-pointer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-rock"></i> las la-hand-rock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-scissors"></i> las la-hand-scissors
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hand-spock"></i> las la-hand-spock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hands"></i> las la-hands
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hands-helping"></i> las la-hands-helping
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-handshake"></i> las la-handshake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-praying-hands"></i> las la-praying-hands
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-down"></i> las la-thumbs-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-up"></i> las la-thumbs-up
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Health</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-accessible-icon"></i> lab la-accessible-icon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ambulance"></i> las la-ambulance
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-h-square"></i> las la-h-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heartbeat"></i> las la-heartbeat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital"></i> las la-hospital
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-medkit"></i> las la-medkit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus-square"></i> las la-plus-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-prescription"></i> las la-prescription
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stethoscope"></i> las la-stethoscope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-md"></i> las la-user-md
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wheelchair"></i> las la-wheelchair
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Holiday</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-candy-cane"></i> las la-candy-cane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-carrot"></i> las la-carrot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cookie-bite"></i> las la-cookie-bite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gift"></i> las la-gift
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gifts"></i> las la-gifts
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-cheers"></i> las la-glass-cheers
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-holly-berry"></i> las la-holly-berry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mug-hot"></i> las la-mug-hot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sleigh"></i> las la-sleigh
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowman"></i> las la-snowman
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Hotel</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-baby-carriage"></i> las la-baby-carriage
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bath"></i> las la-bath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bed"></i> las la-bed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-briefcase"></i> las la-briefcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car"></i> las la-car
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cocktail"></i> las la-cocktail
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coffee"></i> las la-coffee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-concierge-bell"></i> las la-concierge-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice"></i> las la-dice
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-five"></i> las la-dice-five
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-closed"></i> las la-door-closed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-open"></i> las la-door-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dumbbell"></i> las la-dumbbell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini"></i> las la-glass-martini
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini-alt"></i> las la-glass-martini-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hot-tub"></i> las la-hot-tub
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hotel"></i> las la-hotel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-infinity"></i> las la-infinity
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-key"></i> las la-key
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-luggage-cart"></i> las la-luggage-cart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shower"></i> las la-shower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shuttle-van"></i> las la-shuttle-van
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smoking"></i> las la-smoking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smoking-ban"></i> las la-smoking-ban
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowflake"></i> las la-snowflake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-spa"></i> las la-spa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-suitcase"></i> las la-suitcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-suitcase-rolling"></i> las la-suitcase-rolling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swimmer"></i> las la-swimmer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swimming-pool"></i> las la-swimming-pool
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tv"></i> las la-tv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-umbrella-beach"></i> las la-umbrella-beach
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-utensils"></i> las la-utensils
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wheelchair"></i> las la-wheelchair
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wifi"></i> las la-wifi
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Household</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bath"></i> las la-bath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bed"></i> las la-bed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">

                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blender"></i> las la-blender
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chair"></i> las la-chair
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-couch"></i> las la-couch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-closed"></i> las la-door-closed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-open"></i> las la-door-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dungeon"></i> las la-dungeon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fan"></i> las la-fan
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shower"></i> las la-shower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toilet-paper"></i> las la-toilet-paper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tv"></i> las la-tv
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Images</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-adjust"></i> las la-adjust
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bolt"></i> las la-bolt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-camera"></i> las la-camera
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-camera-retro"></i> las la-camera-retro
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chalkboard"></i> las la-chalkboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clone"></i> las la-clone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compress"></i> las la-compress
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compress-arrows-alt"></i> las la-compress-arrows-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-expand"></i> las la-expand
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye"></i> las la-eye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-dropper"></i> las la-eye-dropper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-slash"></i> las la-eye-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-image"></i> las la-file-image
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-film"></i> las la-film
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-badge"></i> las la-id-badge
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-card"></i> las la-id-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-image"></i> las la-image
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-images"></i> las la-images
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-photo-video"></i> las la-photo-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-portrait"></i> las la-portrait
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sliders-h"></i> las la-sliders-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tint"></i> las la-tint
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Interfaces</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-award"></i> las la-award
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ban"></i> las la-ban
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-barcode"></i> las la-barcode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bars"></i> las la-bars
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-beer"></i> las la-beer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell-slash"></i> las la-bell-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blog"></i> las la-blog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bug"></i> las la-bug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullhorn"></i> las la-bullhorn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullseye"></i> las la-bullseye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calculator"></i> las la-calculator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar"></i> las la-calendar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-alt"></i> las la-calendar-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-check"></i> las la-calendar-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-minus"></i> las la-calendar-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-plus"></i> las la-calendar-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-times"></i> las la-calendar-times
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-certificate"></i> las la-certificate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-check"></i> las la-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-check-circle"></i> las la-check-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-check-double"></i> las la-check-double
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-check-square"></i> las la-check-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-circle"></i> las la-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clipboard"></i> las la-clipboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clone"></i> las la-clone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-download-alt"></i> las la-cloud-download-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-upload-alt"></i> las la-cloud-upload-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coffee"></i> las la-coffee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cog"></i> las la-cog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cogs"></i> las la-cogs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-copy"></i> las la-copy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cut"></i> las la-cut
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-database"></i> las la-database
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dot-circle"></i> las la-dot-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-download"></i> las la-download
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-edit"></i> las la-edit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ellipsis-h"></i> las la-ellipsis-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ellipsis-v"></i> las la-ellipsis-v
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope"></i> las la-envelope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope-open"></i> las la-envelope-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eraser"></i> las la-eraser
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation"></i> las la-exclamation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation-circle"></i> las la-exclamation-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation-triangle"></i> las la-exclamation-triangle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-external-link-alt"></i> las la-external-link-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-external-link-square-alt"></i> las la-external-link-square-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye"></i> las la-eye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-slash"></i> las la-eye-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-alt"></i> las la-file-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-download"></i> las la-file-download
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-export"></i> las la-file-export
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-import"></i> las la-file-import
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-upload"></i> las la-file-upload
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-filter"></i> las la-filter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fingerprint"></i> las la-fingerprint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flag"></i> las la-flag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flag-checkered"></i> las la-flag-checkered
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder"></i> las la-folder
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder-open"></i> las la-folder-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frown"></i> las la-frown
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glasses"></i> las la-glasses
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grip-horizontal"></i> las la-grip-horizontal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grip-lines"></i> las la-grip-lines
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grip-lines-vertical"></i> las la-grip-lines-vertical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-grip-vertical"></i> las la-grip-vertical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hashtag"></i> las la-hashtag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-history"></i> las la-history
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-home"></i> las la-home
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-i-cursor"></i> las la-i-cursor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-info"></i> las la-info
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-info-circle"></i> las la-info-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-language"></i> las la-language
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-magic"></i> las la-magic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-marker"></i> las la-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-medal"></i> las la-medal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-meh"></i> las la-meh
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone"></i> las la-microphone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt"></i> las la-microphone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-slash"></i> las la-microphone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-minus"></i> las la-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-minus-circle"></i> las la-minus-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-minus-square"></i> las la-minus-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paste"></i> las la-paste
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen"></i> las la-pen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-alt"></i> las la-pen-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen-fancy"></i> las la-pen-fancy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pencil-alt"></i> las la-pencil-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus"></i> las la-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus-circle"></i> las la-plus-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus-square"></i> las la-plus-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poo"></i> las la-poo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-qrcode"></i> las la-qrcode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-question"></i> las la-question
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-question"></i> las la-question
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-question-circle"></i> las la-question-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quote-left"></i> las la-quote-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quote-right"></i> las la-quote-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-redo"></i> las la-redo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-redo-alt"></i> las la-redo-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-reply"></i> las la-reply
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-reply-all"></i> las la-reply-all
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rss"></i> las la-rss
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rss-square"></i> las la-rss-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-save"></i> las la-save
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-screwdriver"></i> las la-screwdriver
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search"></i> las la-search
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search-minus"></i> las la-search-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search-plus"></i> las la-search-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share"></i> las la-share
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share-alt"></i> las la-share-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share-alt-square"></i> las la-share-alt-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share-square"></i> las la-share-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shield-alt"></i> las la-shield-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign-in-alt"></i> las la-sign-in-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign-out-alt"></i> las la-sign-out-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-signal"></i> las la-signal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sitemap"></i> las la-sitemap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sliders-h"></i> las la-sliders-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smile"></i> las la-smile
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort"></i> las la-sort
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-down"></i> las la-sort-alpha-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-down-alt"></i> las la-sort-alpha-down-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-up"></i> las la-sort-alpha-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-alpha-up-alt"></i> las la-sort-alpha-up-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-amount-down"></i> las la-sort-amount-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-amount-down-alt"></i> las la-sort-amount-down-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-numeric-up"></i> las la-sort-numeric-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-numeric-up-alt"></i> las la-sort-numeric-up-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sort-up"></i> las la-sort-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star"></i> las la-star
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star-half"></i> las la-star-half
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync"></i> las la-sync
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync-alt"></i> las la-sync-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-down"></i> las la-thumbs-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-up"></i> las la-thumbs-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-times"></i> las la-times
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-times-circle"></i> las la-times-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toggle-off"></i> las la-toggle-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toggle-on"></i> las la-toggle-on
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tools"></i> las la-tools
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash"></i> las la-trash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash-alt"></i> las la-trash-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash-restore"></i> las la-trash-restore
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash-restore-alt"></i> las la-trash-restore-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trophy"></i> las la-trophy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-undo"></i> las la-undo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-undo-alt"></i> las la-undo-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-upload"></i> las la-upload
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user"></i> las la-user
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-alt"></i> las la-user-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-circle"></i> las la-user-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-down"></i> las la-volume-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-mute"></i> las la-volume-mute
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-off"></i> las la-volume-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-up"></i> las la-volume-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wifi"></i> las la-wifi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wrench"></i> las la-wrench
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Logistics</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-box"></i> las la-box
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-boxes"></i> las la-boxes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clipboard-check"></i> las la-clipboard-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clipboard-list"></i> las la-clipboard-list
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dolly"></i> las la-dolly
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dolly-flatbed"></i> las la-dolly-flatbed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hard-hat"></i> las la-hard-hat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pallet"></i> las la-pallet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shipping-fast"></i> las la-shipping-fast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck"></i> las la-truck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-warehouse"></i> las la-warehouse
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Maps</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ambulance"></i> las la-ambulance
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-anchor"></i> las la-anchor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale"></i> las la-balance-scale
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-left"></i> las la-balance-scale-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-right"></i> las la-balance-scale-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bath"></i> las la-bath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bed"></i> las la-bed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-beer"></i> las la-beer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell-slash"></i> las la-bell-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bicycle"></i> las la-bicycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-binoculars"></i> las la-binoculars
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-birthday-cake"></i> las la-birthday-cake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blind"></i> las la-blind
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bomb"></i> las la-bomb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book"></i> las la-book
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bookmark"></i> las la-bookmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-briefcase"></i> las la-briefcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-building"></i> las la-building
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car"></i> las la-car
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coffee"></i> las la-coffee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crosshairs"></i> las la-crosshairs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-directions"></i> las la-directions
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dollar-sign"></i> las la-dollar-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-draw-polygon"></i> las la-draw-polygon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye"></i> las la-eye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-slash"></i> las la-eye-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fighter-jet"></i> las la-fighter-jet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire"></i> las la-fire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire-alt"></i> las la-fire-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire-extinguisher"></i> las la-fire-extinguisher
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flag"></i> las la-flag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flag-checkered"></i> las la-flag-checkered
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flask"></i> las la-flask
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gamepad"></i> las la-gamepad
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gavel"></i> las la-gavel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gift"></i> las la-gift
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini"></i> las la-glass-martini
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe"></i> las la-globe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-graduation-cap"></i> las la-graduation-cap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-h-square"></i> las la-h-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heartbeat"></i> las la-heartbeat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-helicopter"></i> las la-helicopter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-home"></i> las la-home
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital"></i> las la-hospital
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-image"></i> las la-image
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-images"></i> las la-images
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-industry"></i> las la-industry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-info"></i> las la-info
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-info-circle"></i> las la-info-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-key"></i> las la-key
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-landmark"></i> las la-landmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-layer-group"></i> las la-layer-group
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-leaf"></i> las la-leaf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lemon"></i> las la-lemon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-life-ring"></i> las la-life-ring
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lightbulb"></i> las la-lightbulb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-location-arrow"></i> las la-location-arrow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-low-vision"></i> las la-low-vision
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-magnet"></i> las la-magnet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-male"></i> las la-male
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map"></i> las la-map
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker"></i> las la-map-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker-alt"></i> las la-map-marker-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-pin"></i> las la-map-pin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-signs"></i> las la-map-signs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-medkit"></i> las la-medkit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill"></i> las la-money-bill
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-alt"></i> las la-money-bill-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-motorcycle"></i> las la-motorcycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-music"></i> las la-music
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-newspaper"></i> las la-newspaper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-parking"></i> las la-parking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paw"></i> las la-paw
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone"></i> las la-phone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-alt"></i> las la-phone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-square"></i> las la-phone-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-square-alt"></i> las la-phone-square-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-volume"></i> las la-phone-volume
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plane"></i> las la-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plug"></i> las la-plug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus"></i> las la-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus-square"></i> las la-plus-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-print"></i> las la-print
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-recycle"></i> las la-recycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-restroom"></i> las la-restroom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-road"></i> las la-road
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rocket"></i> las la-rocket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-route"></i> las la-route
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search"></i> las la-search
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search-minus"></i> las la-search-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search-plus"></i> las la-search-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ship"></i> las la-ship
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shoe-prints"></i> las la-shoe-prints
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-bag"></i> las la-shopping-bag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-basket"></i> las la-shopping-basket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-cart"></i> las la-shopping-cart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shower"></i> las la-shower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowplow"></i> las la-snowplow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-street-view"></i> las la-street-view
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-subway"></i> las la-subway
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-suitcase"></i> las la-suitcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tag"></i> las la-tag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tags"></i> las la-tags
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-taxi"></i> las la-taxi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbtack"></i> las la-thumbtack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ticket-alt"></i> las la-ticket-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tint"></i> las la-tint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-traffic-light"></i> las la-traffic-light
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-train"></i> las la-train
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tram"></i> las la-tram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tree"></i> las la-tree
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trophy"></i> las la-trophy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck"></i> las la-truck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck"></i> las la-truck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tty"></i> las la-tty
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-umbrella"></i> las la-umbrella
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-university"></i> las la-university
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-utensil-spoon"></i> las la-utensil-spoon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-utensils"></i> las la-utensils
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wheelchair"></i> las la-wheelchair
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wifi"></i> las la-wifi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-glass"></i> las la-wine-glass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wrench"></i> las la-wrench
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Maritime</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-anchor"></i> las la-anchor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-binoculars"></i> las la-binoculars
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compass"></i> las la-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dharmachakra"></i> las la-dharmachakra
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frog"></i> las la-frog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ship"></i> las la-ship
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skull-crossbones"></i> las la-skull-crossbones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swimmer"></i> las la-swimmer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-water"></i> las la-water
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wind"></i> las la-wind
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Marketing</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ad"></i> las la-ad
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullhorn"></i> las la-bullhorn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullseye"></i> las la-bullseye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-dollar"></i> las la-comment-dollar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">3
                            <i class="las la-comments-dollar"></i> las la-comments-dollar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope-open-text"></i> las la-envelope-open-text
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-funnel-dollar"></i> las la-funnel-dollar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lightbulb"></i> las la-lightbulb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mail-bulk"></i> las la-mail-bulk
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poll"></i> las la-poll
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poll-h"></i> las la-poll-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search-dollar"></i> las la-search-dollar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search-location"></i> las la-search-location
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Mathematics</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calculator"></i> las la-calculator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-divide"></i> las la-divide
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-equals"></i> las la-equals
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-greater-than"></i> las la-greater-than
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-greater-than-equal"></i> las la-greater-than-equal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-infinity"></i> las la-infinity
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-less-than"></i> las la-less-than
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-less-than-equal"></i> las la-less-than-equal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-minus"></i> las la-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-not-equal"></i> las la-not-equal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-percentage"></i> las la-percentage
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus"></i> las la-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-square-root-alt"></i> las la-square-root-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-subscript"></i> las la-subscript
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-superscript"></i> las la-superscript
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-times"></i> las la-times
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wave-square"></i> las la-wave-square
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Medical</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-allergies"></i> las la-allergies
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ambulance"></i> las la-ambulance
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-band-aid"></i> las la-band-aid
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-biohazard"></i> las la-biohazard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bone"></i> las la-bone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bong"></i> las la-bong
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book-medical"></i> las la-book-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-brain"></i> las la-brain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-briefcase-medical"></i> las la-briefcase-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-burn"></i> las la-burn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cannabis"></i> las la-cannabis
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-capsules"></i> las la-capsules
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clinic-medical"></i> las la-clinic-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-medical"></i> las la-comment-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crutch"></i> las la-crutch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-diagnoses"></i> las la-diagnoses
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dna"></i> las la-dna
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-medical"></i> las la-file-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-medical-alt"></i> las la-file-medical-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-prescription"></i> las la-file-prescription
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-first-aid"></i> las la-first-aid
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heartbeat"></i> las la-heartbeat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital"></i> las la-hospital
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital-alt"></i> las la-hospital-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital-symbol"></i> las la-hospital-symbol
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-card-alt"></i> las la-id-card-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-joint"></i> las la-joint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-laptop-medical"></i> las la-laptop-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microscope"></i> las la-microscope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mortar-pestle"></i> las la-mortar-pestle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-notes-medical"></i> las la-notes-medical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pager"></i> las la-pager
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pills"></i> las la-pills
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus"></i> las la-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poop"></i> las la-poop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-prescription"></i> las la-prescription
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-prescription-bottle"></i> las la-prescription-bottle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-prescription-bottle-alt"></i> las la-prescription-bottle-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-procedures"></i> las la-procedures
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation"></i> las la-radiation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation-alt"></i> las la-radiation-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smoking"></i> las la-smoking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smoking-ban"></i> las la-smoking-ban
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star-of-life"></i> las la-star-of-life
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stethoscope"></i> las la-stethoscope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-syringe"></i> las la-syringe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tablets"></i> las la-tablets
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-teeth"></i> las la-teeth
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-teeth-open"></i> las la-teeth-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thermometer"></i> las la-thermometer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tooth"></i> las la-tooth
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-md"></i> las la-user-md
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-nurse"></i> las la-user-nurse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vial"></i> las la-vial
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vials"></i> las la-vials
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-weight"></i> las la-weight
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-x-ray"></i> las la-x-ray
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Moving</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-archive"></i> las la-archive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-box-open"></i> las la-box-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-couch"></i> las la-couch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dolly"></i> las la-dolly
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-people-carry"></i> las la-people-carry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-route"></i> las la-route
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign"></i> las la-sign
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-suitcase"></i> las la-suitcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tape"></i> las la-tape
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck-loading"></i> las la-truck-loading
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck-moving"></i> las la-truck-moving
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-glass"></i> las la-wine-glass
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Music</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drum"></i> las la-drum
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drum-steelpan"></i> las la-drum-steelpan
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-audio"></i> las la-file-audio
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-guitar"></i> las la-guitar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headphones"></i> las la-headphones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headphones-alt"></i> las la-headphones-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone"></i> las la-microphone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt"></i> las la-microphone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt-slash"></i> las la-microphone-alt-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-slash"></i> las la-microphone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-music"></i> las la-music
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-napster"></i> lab la-napster
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-play"></i> las la-play
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-record-vinyl"></i> las la-record-vinyl
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sliders-h"></i> las la-sliders-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-soundcloud"></i> lab la-soundcloud
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-spotify"></i> lab la-spotify
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-down"></i> las la-volume-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-mute"></i> las la-volume-mute
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-off"></i> las la-volume-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-up"></i> las la-volume-up
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Objects</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ambulance"></i> las la-ambulance
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-anchor"></i> las la-anchor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-archive"></i> las la-archive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-award"></i> las la-award
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-baby-carriage"></i> las la-baby-carriage
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale"></i> las la-balance-scale
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-left"></i> las la-balance-scale-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-right"></i> las la-balance-scale-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bath"></i> las la-bath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bed"></i> las la-bed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-beer"></i> las la-beer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bicycle"></i> las la-bicycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-binoculars"></i> las la-binoculars
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-birthday-cake"></i> las la-birthday-cake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blender"></i> las la-blender
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bomb"></i> las la-bomb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book"></i> las la-book
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book-dead"></i> las la-book-dead
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bookmark"></i> las la-bookmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-briefcase"></i> las la-briefcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-broadcast-tower"></i> las la-broadcast-tower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bug"></i> las la-bug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-building"></i> las la-building
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullhorn"></i> las la-bullhorn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullseye"></i> las la-bullseye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bus"></i> las la-bus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calculator"></i> las la-calculator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar"></i> las la-calendar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-alt"></i> las la-calendar-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-camera"></i> las la-camera
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-camera-retro"></i> las la-camera-retro
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-candy-cane"></i> las la-candy-cane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-car"></i> las la-car
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-carrot"></i> las la-carrot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-church"></i> las la-church
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clipboard"></i> las la-clipboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud"></i> las la-cloud
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-coffee"></i> las la-coffee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cog"></i> las la-cog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cogs"></i> las la-cogs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compass"></i> las la-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cookie"></i> las la-cookie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cookie-bite"></i> las la-cookie-bite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-copy"></i> las la-copy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cube"></i> las la-cube
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cubes"></i> las la-cubes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cut"></i> las la-cut
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice"></i> las la-dice
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-d20"></i> las la-dice-d20
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-d6"></i> las la-dice-d6
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-five"></i> las la-dice-five
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-four"></i> las la-dice-four
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-one"></i> las la-dice-one
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-six"></i> las la-dice-six
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-three"></i> las la-dice-three
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-two"></i> las la-dice-two
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-digital-tachograph"></i> las la-digital-tachograph
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-closed"></i> las la-door-closed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-open"></i> las la-door-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drum"></i> las la-drum
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-drum-steelpan"></i> las la-drum-steelpan
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope"></i> las la-envelope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope-open"></i> las la-envelope-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eraser"></i> las la-eraser
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye"></i> las la-eye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-dropper"></i> las la-eye-dropper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fax"></i> las la-fax
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-feather"></i> las la-feather
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-feather-alt"></i> las la-feather-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fighter-jet"></i> las la-fighter-jet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-alt"></i> las la-file-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-prescription"></i> las la-file-prescription
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-film"></i> las la-film
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire"></i> las la-fire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire-alt"></i> las la-fire-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire-extinguisher"></i> las la-fire-extinguisher
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flag"></i> las la-flag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flag-checkered"></i> las la-flag-checkered
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flask"></i> las la-flask
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-futbol"></i> las la-futbol
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gamepad"></i> las la-gamepad
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gavel"></i> las la-gavel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gem"></i> las la-gem
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gift"></i> las la-gift
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gifts"></i> las la-gifts
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-cheers"></i> las la-glass-cheers
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini"></i> las la-glass-martini
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-whiskey"></i> las la-glass-whiskey
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glasses"></i> las la-glasses
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe"></i> las la-globe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-graduation-cap"></i> las la-graduation-cap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-guitar"></i> las la-guitar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hat-wizard"></i> las la-hat-wizard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hdd"></i> las la-hdd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headphones"></i> las la-headphones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headphones-alt"></i> las la-headphones-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-headset"></i> las la-headset
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart-broken"></i> las la-heart-broken
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-helicopter"></i> las la-helicopter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-highlighter"></i> las la-highlighter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-holly-berry"></i> las la-holly-berry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-home"></i> las la-home
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hospital"></i> las la-hospital
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hourglass"></i> las la-hourglass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-igloo"></i> las la-igloo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-image"></i> las la-image
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-images"></i> las la-images
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-industry"></i> las la-industry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-key"></i> las la-key
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-keyboard"></i> las la-keyboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-laptop"></i> las la-laptop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-leaf"></i> las la-leaf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lemon"></i> las la-lemon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-life-ring"></i> las la-life-ring
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lightbulb"></i> las la-lightbulb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lock"></i> las la-lock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lock-open"></i> las la-lock-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-magic"></i> las la-magic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-magnet"></i> las la-magnet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map"></i> las la-map
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker"></i> las la-map-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker-alt"></i> las la-map-marker-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-pin"></i> las la-map-pin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-signs"></i> las la-map-signs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-marker"></i> las la-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-medal"></i> las la-medal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-medkit"></i> las la-medkit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-memory"></i> las la-memory
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microchip"></i> las la-microchip
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone"></i> las la-microphone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt"></i> las la-microphone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mitten"></i> las la-mitten
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mobile"></i> las la-mobile
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mobile-alt"></i> las la-mobile-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill"></i> las la-money-bill
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-bill-alt"></i> las la-money-bill-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check"></i> las la-money-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check-alt"></i> las la-money-check-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-moon"></i> las la-moon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-motorcycle"></i> las la-motorcycle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mug-hot"></i> las la-mug-hot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-newspaper"></i> las la-newspaper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paint-brush"></i> las la-paint-brush
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paper-plane"></i> las la-paper-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paperclip"></i> las la-paperclip
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paste"></i> las la-paste
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-paw"></i> las la-paw
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pen"></i> las la-pen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone"></i> las la-phone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-alt"></i> las la-phone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plane"></i> las la-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plug"></i> las la-plug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-print"></i> las la-print
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-puzzle-piece"></i> las la-puzzle-piece
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ring"></i> las la-ring
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-road"></i> las la-road
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rocket"></i> las la-rocket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-combined"></i> las la-ruler-combined
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-horizontal"></i> las la-ruler-horizontal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ruler-vertical"></i> las la-ruler-vertical
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-satellite"></i> las la-satellite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-satellite-dish"></i> las la-satellite-dish
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-save"></i> las la-save
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-school"></i> las la-school
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-screwdriver"></i> las la-screwdriver
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-scroll"></i> las la-scroll
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sd-card"></i> las la-sd-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-search"></i> las la-search
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shield-alt"></i> las la-shield-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-bag"></i> las la-shopping-bag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-basket"></i> las la-shopping-basket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-cart"></i> las la-shopping-cart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shower"></i> las la-shower
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sim-card"></i> las la-sim-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skull-crossbones"></i> las la-skull-crossbones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sleigh"></i> las la-sleigh
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowflake"></i> las la-snowflake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowplow"></i> las la-snowplow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-space-shuttle"></i> las la-space-shuttle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star"></i> las la-star
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sticky-note"></i> las la-sticky-note
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stopwatch"></i> las la-stopwatch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stroopwafel"></i> las la-stroopwafel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-subway"></i> las la-subway
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-suitcase"></i> las la-suitcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sun"></i> las la-sun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tablet"></i> las la-tablet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tablet-alt"></i> las la-tablet-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tachometer-alt"></i> las la-tachometer-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tag"></i> las la-tag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tags"></i> las la-tags
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-taxi"></i> las la-taxi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbtack"></i> las la-thumbtack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ticket-alt"></i> las la-ticket-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toilet"></i> las la-toilet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toolbox"></i> las la-toolbox
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tools"></i> las la-tools
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-train"></i> las la-train
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tram"></i> las la-tram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash"></i> las la-trash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trash-alt"></i> las la-trash-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tree"></i> las la-tree
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trophy"></i> las la-trophy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-truck"></i> las la-truck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tv"></i> las la-tv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-umbrella"></i> las la-umbrella
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-university"></i> las la-university
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-unlock"></i> las la-unlock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-unlock-alt"></i> las la-unlock-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-utensil-spoon"></i> las la-utensil-spoon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-utensils"></i> las la-utensils
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wallet"></i> las la-wallet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-weight"></i> las la-weight
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wheelchair"></i> las la-wheelchair
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-glass"></i> las la-wine-glass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wrench"></i> las la-wrench
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Other</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-500px"></i> lab la-500px
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-accusoft"></i> lab la-accusoft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-adn"></i> lab la-adn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-adobe"></i> lab la-adobe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-adversal"></i> lab la-adversal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-affiliatetheme"></i> lab la-affiliatetheme
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-airbnb"></i> lab la-airbnb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-algolia"></i> lab la-algolia
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-amazon"></i> lab la-amazon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-amilia"></i> lab la-amilia
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-android"></i> lab la-android
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-angellist"></i> lab la-angellist
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-angrycreative"></i> lab la-angrycreative
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-angular"></i> lab la-angular
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-app-store"></i> lab la-app-store
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-app-store-ios"></i> lab la-app-store-ios
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-apper"></i> lab la-apper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-apple"></i> lab la-apple
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-artstation"></i> lab la-artstation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-asymmetrik"></i> lab la-asymmetrik
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-atlassian"></i> lab la-atlassian
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-audible"></i> lab la-audible
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-autoprefixer"></i> lab la-autoprefixer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-avianex"></i> lab la-avianex
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-aviato"></i> lab la-aviato
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-aws"></i> lab la-aws
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-backspace"></i> las la-backspace
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bandcamp"></i> lab la-bandcamp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-battle-net"></i> lab la-battle-net
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-behance"></i> lab la-behance
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-behance-square"></i> lab la-behance-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-behance-square"></i> lab la-behance-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bimobject"></i> lab la-bimobject
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bitbucket"></i> lab la-bitbucket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bity"></i> lab la-bity
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-black-tie"></i> lab la-black-tie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-blackberry"></i> lab la-blackberry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blender-phone"></i> las la-blender-phone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-blogger"></i> lab la-blogger
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-blogger-b"></i> lab la-blogger-b
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bootstrap"></i> lab la-bootstrap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buffer"></i> lab la-buffer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buromobelexperte"></i> lab la-buromobelexperte
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buy-n-large"></i> lab la-buy-n-large
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-buysellads"></i> lab la-buysellads
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-canadian-maple-leaf"></i> lab la-canadian-maple-leaf
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-centercode"></i> lab la-centercode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-centos"></i> lab la-centos
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-chrome"></i> lab la-chrome
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-chromecast"></i> lab la-chromecast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cloudscale"></i> lab la-cloudscale
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cloudsmith"></i> lab la-cloudsmith
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cloudversify"></i> lab la-cloudversify
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-codepen"></i> lab la-codepen
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-codiepie"></i> lab la-codiepie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-confluence"></i> lab la-confluence
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-connectdevelop"></i> lab la-connectdevelop
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-contao"></i> lab la-contao
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cotton-bureau"></i> lab la-cotton-bureau
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cpanel"></i> lab la-cpanel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons"></i> lab la-creative-commons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-by"></i> lab la-creative-commons-by
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nc"></i> lab la-creative-commons-nc
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nc-eu"></i> lab la-creative-commons-nc-eu
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nc-jp"></i> lab la-creative-commons-nc-jp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-nd"></i> lab la-creative-commons-nd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-pd"></i> lab la-creative-commons-pd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-pd-alt"></i> lab la-creative-commons-pd-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-remix"></i> lab la-creative-commons-remix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-sa"></i> lab la-creative-commons-sa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-sampling"></i> lab la-creative-commons-sampling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-sampling-plus"></i> lab la-creative-commons-sampling-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-share"></i> lab la-creative-commons-share
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-creative-commons-zero"></i> lab la-creative-commons-zero
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crown"></i> las la-crown
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-css3"></i> lab la-css3
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-css3-alt"></i> lab la-css3-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cuttlefish"></i> lab la-cuttlefish
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dashcube"></i> lab la-dashcube
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-delicious"></i> lab la-delicious
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-deploydog"></i> lab la-deploydog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-deskpro"></i> lab la-deskpro
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dev"></i> lab la-dev
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-deviantart"></i> lab la-deviantart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dhl"></i> lab la-dhl
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-diaspora"></i> lab la-diaspora
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-digg"></i> lab la-digg
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-digital-ocean"></i> lab la-digital-ocean
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-discord"></i> lab la-discord
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-discourse"></i> lab la-discourse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dochub"></i> lab la-dochub
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-docker"></i> lab la-docker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-draft2digital"></i> lab la-draft2digital
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dribbble"></i> lab la-dribbble
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dribbble-square"></i> lab la-dribbble-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dropbox"></i> lab la-dropbox
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-drupal"></i> lab la-drupal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dumpster-fire"></i> las la-dumpster-fire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-dyalog"></i> lab la-dyalog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-earlybirds"></i> lab la-earlybirds
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ebay"></i> lab la-ebay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-edge"></i> lab la-edge
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-elementor"></i> lab la-elementor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ello"></i> lab la-ello
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ember"></i> lab la-ember
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-empire"></i> lab la-empire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-envira"></i> lab la-envira
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-erlang"></i> lab la-erlang
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-etsy"></i> lab la-etsy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-evernote"></i> lab la-evernote
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-expeditedssl"></i> lab la-expeditedssl
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook"></i> lab la-facebook
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook-f"></i> lab la-facebook-f
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook-messenger"></i> lab la-facebook-messenger
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-facebook-square"></i> lab la-facebook-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fedex"></i> lab la-fedex
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fedora"></i> lab la-fedora
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-figma"></i> lab la-figma
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-csv"></i> las la-file-csv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-firefox"></i> lab la-firefox
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-first-order"></i> lab la-first-order
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-first-order-alt"></i> lab la-first-order-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-firstdraft"></i> lab la-firstdraft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-flickr"></i> lab la-flickr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-flipboard"></i> lab la-flipboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fly"></i> lab la-fly
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-font-awesome"></i> lab la-font-awesome
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-font-awesome-alt"></i> lab la-font-awesome-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-font-awesome-flag"></i> lab la-font-awesome-flag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fonticons"></i> lab la-fonticons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fonticons-fi"></i> lab la-fonticons-fi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fort-awesome"></i> lab la-fort-awesome
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fort-awesome-alt"></i> lab la-fort-awesome-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-forumbee"></i> lab la-forumbee
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-foursquare"></i> lab la-foursquare
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-free-code-camp"></i> lab la-free-code-camp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-freebsd"></i> lab la-freebsd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fulcrum"></i> lab la-fulcrum
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-get-pocket"></i> lab la-get-pocket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-git"></i> lab la-git
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-git-alt"></i> lab la-git-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-git-square"></i> lab la-git-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gitlab"></i> lab la-gitlab
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gitter"></i> lab la-gitter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-glide"></i> lab la-glide
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-glide-g"></i> lab la-glide-g
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gofore"></i> lab la-gofore
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-goodreads"></i> lab la-goodreads
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-goodreads-g"></i> lab la-goodreads-g
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google"></i> lab la-google
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-drive"></i> lab la-google-drive
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-play"></i> lab la-google-play
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-plus"></i> lab la-google-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-plus-g"></i> lab la-google-plus-g
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-plus-square"></i> lab la-google-plus-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gratipay"></i> lab la-gratipay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-grav"></i> lab la-grav
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gripfire"></i> lab la-gripfire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-grunt"></i> lab la-grunt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-gulp"></i> lab la-gulp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hacker-news"></i> lab la-hacker-news
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hacker-news-square"></i> lab la-hacker-news-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hackerrank"></i> lab la-hackerrank
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hips"></i> lab la-hips
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hire-a-helper"></i> lab la-hire-a-helper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hooli"></i> lab la-hooli
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hornbill"></i> lab la-hornbill
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hotjar"></i> lab la-hotjar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-houzz"></i> lab la-houzz
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-html5"></i> lab la-html5
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-hubspot"></i> lab la-hubspot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-imdb"></i> lab la-imdb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-instagram"></i> lab la-instagram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-intercom"></i> lab la-intercom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-internet-explorer"></i> lab la-internet-explorer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-invision"></i> lab la-invision
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ioxhost"></i> lab la-ioxhost
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-itch-io"></i> lab la-itch-io
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-itunes"></i> lab la-itunes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-itunes-note"></i> lab la-itunes-note
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-java"></i> lab la-java
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-jenkins"></i> lab la-jenkins
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-jira"></i> lab la-jira
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-joget"></i> lab la-joget
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-joomla"></i> lab la-joomla
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-js"></i> lab la-js
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-js-square"></i> lab la-js-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-jsfiddle"></i> lab la-jsfiddle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-kaggle"></i> lab la-kaggle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-keybase"></i> lab la-keybase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-keycdn"></i> lab la-keycdn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-kickstarter"></i> lab la-kickstarter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-kickstarter-k"></i> lab la-kickstarter-k
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-korvue"></i> lab la-korvue
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-laravel"></i> lab la-laravel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-lastfm"></i> lab la-lastfm
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-lastfm-square"></i> lab la-lastfm-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-leanpub"></i> lab la-leanpub
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-less"></i> lab la-less
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-line"></i> lab la-line
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linkedin"></i> lab la-linkedin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linkedin-in"></i> lab la-linkedin-in
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linode"></i> lab la-linode
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-linux"></i> lab la-linux
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-lyft"></i> lab la-lyft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-magento"></i> lab la-magento
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mailchimp"></i> lab la-mailchimp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mandalorian"></i> lab la-mandalorian
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-markdown"></i> lab la-markdown
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mastodon"></i> lab la-mastodon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-maxcdn"></i> lab la-maxcdn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mdb"></i> lab la-mdb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medapps"></i> lab la-medapps
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medium"></i> lab la-medium
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medium-m"></i> lab la-medium-m
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-medrt"></i> lab la-medrt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-meetup"></i> lab la-meetup
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-megaport"></i> lab la-megaport
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mendeley"></i> lab la-mendeley
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-microsoft"></i> lab la-microsoft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-microsoft"></i> lab la-microsoft
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mix"></i> lab la-mix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mixcloud"></i> lab la-mixcloud
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-mizuni"></i> lab la-mizuni
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-modx"></i> lab la-modx
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-monero"></i> lab la-monero
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-neos"></i> lab la-neos
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-network-wired"></i> las la-network-wired
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-nimblr"></i> lab la-nimblr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-node"></i> lab la-node
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-node-js"></i> lab la-node-js
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-npm"></i> lab la-npm
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ns8"></i> lab la-ns8
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-nutritionix"></i> lab la-nutritionix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-odnoklassniki"></i> lab la-odnoklassniki
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-odnoklassniki-square"></i> lab la-odnoklassniki-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-opencart"></i> lab la-opencart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-openid"></i> lab la-openid
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-opera"></i> lab la-opera
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-optin-monster"></i> lab la-optin-monster
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-orcid"></i> lab la-orcid
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-osi"></i> lab la-osi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-page4"></i> lab la-page4
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pagelines"></i> lab la-pagelines
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-palfed"></i> lab la-palfed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-patreon"></i> lab la-patreon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-periscope"></i> lab la-periscope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-phabricator"></i> lab la-phabricator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-phoenix-framework"></i> lab la-phoenix-framework
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-phoenix-squadron"></i> lab la-phoenix-squadron
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-php"></i> lab la-php
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper"></i> lab la-pied-piper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper-alt"></i> lab la-pied-piper-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper-hat"></i> lab la-pied-piper-hat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pied-piper-pp"></i> lab la-pied-piper-pp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pinterest"></i> lab la-pinterest
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pinterest-p"></i> lab la-pinterest-p
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pinterest-square"></i> lab la-pinterest-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-product-hunt"></i> lab la-product-hunt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-pushed"></i> lab la-pushed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-python"></i> lab la-python
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-qq"></i> lab la-qq
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-quinscape"></i> lab la-quinscape
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-quora"></i> lab la-quora
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-r-project"></i> lab la-r-project
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-raspberry-pi"></i> lab la-raspberry-pi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ravelry"></i> lab la-ravelry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-react"></i> lab la-react
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reacteurope"></i> lab la-reacteurope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-readme"></i> lab la-readme
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rebel"></i> lab la-rebel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-red-river"></i> lab la-red-river
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reddit"></i> lab la-reddit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reddit-alien"></i> lab la-reddit-alien
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-reddit-square"></i> lab la-reddit-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-redhat"></i> lab la-redhat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-renren"></i> lab la-renren
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-replyd"></i> lab la-replyd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-researchgate"></i> lab la-researchgate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-resolving"></i> lab la-resolving
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rev"></i> lab la-rev
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rocketchat"></i> lab la-rocketchat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-rockrms"></i> lab la-rockrms
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-safari"></i> lab la-safari
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-salesforce"></i> lab la-salesforce
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sass"></i> lab la-sass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-schlix"></i> lab la-schlix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-scribd"></i> lab la-scribd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-searchengin"></i> lab la-searchengin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sellcast"></i> lab la-sellcast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sellsy"></i> lab la-sellsy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-servicestack"></i> lab la-servicestack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-shirtsinbulk"></i> lab la-shirtsinbulk
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-shopware"></i> lab la-shopware
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-signature"></i> las la-signature
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-simplybuilt"></i> lab la-simplybuilt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sistrix"></i> lab la-sistrix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sith"></i> lab la-sith
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sketch"></i> lab la-sketch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skull"></i> las la-skull
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-skyatlas"></i> lab la-skyatlas
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-skype"></i> lab la-skype
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-slack"></i> lab la-slack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-slack-hash"></i> lab la-slack-hash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-slideshare"></i> lab la-slideshare
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-snapchat"></i> lab la-snapchat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-snapchat-ghost"></i> lab la-snapchat-ghost
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-snapchat-square"></i> lab la-snapchat-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sourcetree"></i> lab la-sourcetree
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-speakap"></i> lab la-speakap
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-speaker-deck"></i> lab la-speaker-deck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-squarespace"></i> lab la-squarespace
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stack-exchange"></i> lab la-stack-exchange
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stack-overflow"></i> lab la-stack-overflow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stackpath"></i> lab la-stackpath
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-staylinked"></i> lab la-staylinked
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-sticker-mule"></i> lab la-sticker-mule
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-strava"></i> lab la-strava
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-studiovinari"></i> lab la-studiovinari
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stumbleupon"></i> lab la-stumbleupon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stumbleupon-circle"></i> lab la-stumbleupon-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-superpowers"></i> lab la-superpowers
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-supple"></i> lab la-supple
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-suse"></i> lab la-suse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-swift"></i> lab la-swift
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-symfony"></i> lab la-symfony
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-teamspeak"></i> lab la-teamspeak
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-telegram"></i> lab la-telegram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-telegram-plane"></i> lab la-telegram-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tencent-weibo"></i> lab la-tencent-weibo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-the-red-yeti"></i> lab la-the-red-yeti
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-themeco"></i> lab la-themeco
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-themeisle"></i> lab la-themeisle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-think-peaks"></i> lab la-think-peaks
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-trade-federation"></i> lab la-trade-federation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-trello"></i> lab la-trello
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tripadvisor"></i> lab la-tripadvisor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tumblr"></i> lab la-tumblr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-tumblr-square"></i> lab la-tumblr-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-twitter"></i> lab la-twitter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-twitter-square"></i> lab la-twitter-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-typo3"></i> lab la-typo3
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-uber"></i> lab la-uber
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ubuntu"></i> lab la-ubuntu
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-uikit"></i> lab la-uikit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-umbraco"></i> lab la-umbraco
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-uniregistry"></i> lab la-uniregistry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-untappd"></i> lab la-untappd
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ups"></i> lab la-ups
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-usb"></i> lab la-usb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-usps"></i> lab la-usps
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ussunnah"></i> lab la-ussunnah
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vaadin"></i> lab la-vaadin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viacoin"></i> lab la-viacoin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viadeo"></i> lab la-viadeo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viadeo-square"></i> lab la-viadeo-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-viber"></i> lab la-viber
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vimeo"></i> lab la-vimeo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vimeo-square"></i> lab la-vimeo-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vimeo-v"></i> lab la-vimeo-v
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vine"></i> lab la-vine
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vk"></i> lab la-vk
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vnv"></i> lab la-vnv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vr-cardboard"></i> las la-vr-cardboard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-vuejs"></i> lab la-vuejs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-waze"></i> lab la-waze
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-weebly"></i> lab la-weebly
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-weibo"></i> lab la-weibo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-weight-hanging"></i> las la-weight-hanging
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-weixin"></i> lab la-weixin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-whatsapp"></i> lab la-whatsapp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-whatsapp-square"></i> lab la-whatsapp-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-whmcs"></i> lab la-whmcs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wikipedia-w"></i> lab la-wikipedia-w
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-windows"></i> lab la-windows
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wix"></i> lab la-wix
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wolf-pack-battalion"></i> lab la-wolf-pack-battalion
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wordpress"></i> lab la-wordpress
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wordpress-simple"></i> lab la-wordpress-simple
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpbeginner"></i> lab la-wpbeginner
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpexplorer"></i> lab la-wpexplorer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpforms"></i> lab la-wpforms
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wpressr"></i> lab la-wpressr
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-xing"></i> lab la-xing
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-xing-square"></i> lab la-xing-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-y-combinator"></i> lab la-y-combinator
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yahoo"></i> lab la-yahoo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yammer"></i> lab la-yammer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yandex"></i> lab la-yandex
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yandex-international"></i> lab la-yandex-international
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yarn"></i> lab la-yarn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yelp"></i> lab la-yelp
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-yoast"></i> lab la-yoast
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-youtube-square"></i> lab la-youtube-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-zhihu"></i> lab la-zhihu
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Payments & Shopping</h6>
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-alipay"></i> lab la-alipay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-amazon-pay"></i> lab la-amazon-pay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-apple-pay"></i> lab la-apple-pay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-bitcoin"></i> lab la-bitcoin
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bookmark"></i> las la-bookmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-btc"></i> lab la-btc
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullhorn"></i> las la-bullhorn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-camera"></i> las la-camera
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-camera-retro"></i> las la-camera-retro
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cart-arrow-down"></i> las la-cart-arrow-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cart-plus"></i> las la-cart-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-amazon-pay"></i> lab la-cc-amazon-pay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-amex"></i> lab la-cc-amex
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-apple-pay"></i> lab la-cc-apple-pay
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-diners-club"></i> lab la-cc-diners-club
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-discover"></i> lab la-cc-discover
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-jcb"></i> lab la-cc-jcb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-mastercard"></i> lab la-cc-mastercard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-paypal"></i> lab la-cc-paypal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-stripe"></i> lab la-cc-stripe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-cc-visa"></i> lab la-cc-visa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-certificate"></i> las la-certificate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-credit-card"></i> las la-credit-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-ethereum"></i> lab la-ethereum
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gem"></i> las la-gem
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gift"></i> las la-gift
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-google-wallet"></i> lab la-google-wallet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-handshake"></i> las la-handshake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-key"></i> las la-key
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check"></i> las la-money-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-money-check-alt"></i> las la-money-check-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-paypal"></i> lab la-paypal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-receipt"></i> las la-receipt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-bag"></i> las la-shopping-bag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-basket"></i> las la-shopping-basket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-cart"></i> las la-shopping-cart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star"></i> las la-star
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stripe"></i> lab la-stripe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-stripe-s"></i> lab la-stripe-s
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tag"></i> las la-tag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tags"></i> las la-tags
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-down"></i> las la-thumbs-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-up"></i> las la-thumbs-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-trophy"></i> las la-trophy
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Political</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-award"></i> las la-award
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale"></i> las la-balance-scale
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-left"></i> las la-balance-scale-left
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-balance-scale-right"></i> las la-balance-scale-right
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bullhorn"></i> las la-bullhorn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-check-double"></i> las la-check-double
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-democrat"></i> las la-democrat
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-donate"></i> las la-donate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dove"></i> las la-dove
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fist-raised"></i> las la-fist-raised
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flag-usa"></i> las la-flag-usa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-handshake"></i> las la-handshake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-person-booth"></i> las la-person-booth
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-piggy-bank"></i> las la-piggy-bank
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-republican"></i> las la-republican
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vote-yea"></i> las la-vote-yea
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ankh"></i> las la-ankh
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-atom"></i> las la-atom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bible"></i> las la-bible
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-church"></i> las la-church
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cross"></i> las la-cross
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dharmachakra"></i> las la-dharmachakra
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dove"></i> las la-dove
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gopuram"></i> las la-gopuram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hamsa"></i> las la-hamsa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hanukiah"></i> las la-hanukiah
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-haykal"></i> las la-haykal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-jedi"></i> las la-jedi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-journal-whills"></i> las la-journal-whills
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-kaaba"></i> las la-kaaba
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-khanda"></i> las la-khanda
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-menorah"></i> las la-menorah
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mosque"></i> las la-mosque
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-om"></i> las la-om
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pastafarianism"></i> las la-pastafarianism
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-peace"></i> las la-peace
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-place-of-worship"></i> las la-place-of-worship
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pray"></i> las la-pray
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-praying-hands"></i> las la-praying-hands
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quran"></i> las la-quran
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star-and-crescent"></i> las la-star-and-crescent
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star-of-david"></i> las la-star-of-david
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-synagogue"></i> las la-synagogue
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-torah"></i> las la-torah
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-torii-gate"></i> las la-torii-gate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vihara"></i> las la-vihara
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-yin-yang"></i> las la-yin-yang
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Science</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-atom"></i> las la-atom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-biohazard"></i> las la-biohazard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-brain"></i> las la-brain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-burn"></i> las la-burn
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-capsules"></i> las la-capsules
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-clipboard-check"></i> las la-clipboard-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dna"></i> las la-dna
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-dropper"></i> las la-eye-dropper
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-filter"></i> las la-filter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire"></i> las la-fire
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fire-alt"></i> las la-fire-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-flask"></i> las la-flask
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frog"></i> las la-frog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-magnet"></i> las la-magnet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microscope"></i> las la-microscope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mortar-pestle"></i> las la-mortar-pestle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pills"></i> las la-pills
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-prescription-bottle"></i> las la-prescription-bottle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation"></i> las la-radiation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-radiation-alt"></i> las la-radiation-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-seedling"></i> las la-seedling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skull-crossbones"></i> las la-skull-crossbones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-syringe"></i> las la-syringe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tablets"></i> las la-tablets
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-temperature-high"></i> las la-temperature-high
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-temperature-low"></i> las la-temperature-low
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vial"></i> las la-vial
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-vials"></i> las la-vials
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-galactic-republic"></i> lab la-galactic-republic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-galactic-senate"></i> lab la-galactic-senate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe"></i> las la-globe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-jedi"></i> las la-jedi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-jedi-order"></i> lab la-jedi-order
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-journal-whills"></i> las la-journal-whills
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-meteor"></i> las la-meteor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-moon"></i> las la-moon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-old-republic"></i> lab la-old-republic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-robot"></i> las la-robot
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rocket"></i> las la-rocket
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-satellite"></i> las la-satellite
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-satellite-dish"></i> las la-satellite-dish
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-space-shuttle"></i> las la-space-shuttle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-astronaut"></i> las la-user-astronaut
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ban"></i> las la-ban
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bug"></i> las la-bug
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-closed"></i> las la-door-closed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-open"></i> las la-door-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dungeon"></i> las la-dungeon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye"></i> las la-eye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-slash"></i> las la-eye-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-contract"></i> las la-file-contract
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-signature"></i> las la-file-signature
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fingerprint"></i> las la-fingerprint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-badge"></i> las la-id-badge
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-card"></i> las la-id-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-card-alt"></i> las la-id-card-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-key"></i> las la-key
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lock"></i> las la-lock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lock-open"></i> las la-lock-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mask"></i> las la-mask
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-passport"></i> las la-passport
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shield-alt"></i> las la-shield-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-unlock"></i> las la-unlock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-unlock-alt"></i> las la-unlock-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-lock"></i> las la-user-lock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-secret"></i> las la-user-secret
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-shield"></i> las la-user-shield
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bookmark"></i> las la-bookmark
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar"></i> las la-calendar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-certificate"></i> las la-certificate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-circle"></i> las la-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud"></i> las la-cloud
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment"></i> las la-comment
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder"></i> las la-folder
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart-broken"></i> las la-heart-broken
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker"></i> las la-map-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-play"></i> las la-play
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shapes"></i> las la-shapes
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-square"></i> las la-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star"></i> las la-star
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-birthday-cake"></i> las la-birthday-cake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-camera"></i> las la-camera
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment"></i> las la-comment
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-alt"></i> las la-comment-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-envelope"></i> las la-envelope
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hashtag"></i> las la-hashtag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-heart"></i> las la-heart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-icons"></i> las la-icons
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-image"></i> las la-image
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-images"></i> las la-images
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker"></i> las la-map-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker-alt"></i> las la-map-marker-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-photo-video"></i> las la-photo-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poll"></i> las la-poll
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poll-h"></i> las la-poll-h
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-retweet"></i> las la-retweet
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share"></i> las la-share
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share-alt"></i> las la-share-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-share-square"></i> las la-share-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star"></i> las la-star
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-down"></i> las la-thumbs-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-up"></i> las la-thumbs-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbtack"></i> las la-thumbtack
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user"></i> las la-user
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-circle"></i> las la-user-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-friends"></i> las la-user-friends
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-plus"></i> las la-user-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-users"></i> las la-users
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-video"></i> las la-video
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-asterisk"></i> las la-asterisk
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-atom"></i> las la-atom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-certificate"></i> las la-certificate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-circle-notch"></i> las la-circle-notch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cog"></i> las la-cog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compact-disc"></i> las la-compact-disc
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compass"></i> las la-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-crosshairs"></i> las la-crosshairs
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dharmachakra"></i> las la-dharmachakra
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fan"></i> las la-fan
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-haykal"></i> las la-haykal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-life-ring"></i> las la-life-ring
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-palette"></i> las la-palette
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ring"></i> las la-ring
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-slash"></i> las la-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowflake"></i> las la-snowflake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-spinner"></i> las la-spinner
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stroopwafel"></i> las la-stroopwafel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sun"></i> las la-sun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync"></i> las la-sync
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sync-alt"></i> las la-sync-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-yin-yang"></i> las la-yin-yang
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-baseball-ball"></i> las la-baseball-ball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-basketball-ball"></i> las la-basketball-ball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-biking"></i> las la-biking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bowling-ball"></i> las la-bowling-ball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dumbbell"></i> las la-dumbbell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-football-ball"></i> las la-football-ball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-futbol"></i> las la-futbol
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-golf-ball"></i> las la-golf-ball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hockey-puck"></i> las la-hockey-puck
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-quidditch"></i> las la-quidditch
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-running"></i> las la-running
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skating"></i> las la-skating
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skiing"></i> las la-skiing
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skiing-nordic"></i> las la-skiing-nordic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowboarding"></i> las la-snowboarding
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swimmer"></i> las la-swimmer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-table-tennis"></i> las la-table-tennis
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volleyball-ball"></i> las la-volleyball-ball
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-allergies"></i> las la-allergies
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-broom"></i> las la-broom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-sun"></i> las la-cloud-sun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-sun-rain"></i> las la-cloud-sun-rain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frog"></i> las la-frog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rainbow"></i> las la-rainbow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-seedling"></i> las la-seedling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-umbrella"></i> las la-umbrella
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ban"></i> las la-ban
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-empty"></i> las la-battery-empty
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-full"></i> las la-battery-full
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-half"></i> las la-battery-half
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-quarter"></i> las la-battery-quarter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-battery-three-quarters"></i> las la-battery-three-quarters
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell"></i> las la-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bell-slash"></i> las la-bell-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar"></i> las la-calendar
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-alt"></i> las la-calendar-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-check"></i> las la-calendar-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-day"></i> las la-calendar-day
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-minus"></i> las la-calendar-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-plus"></i> las la-calendar-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-times"></i> las la-calendar-times
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-calendar-week"></i> las la-calendar-week
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cart-arrow-down"></i> las la-cart-arrow-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cart-plus"></i> las la-cart-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment"></i> las la-comment
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-alt"></i> las la-comment-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-comment-slash"></i> las la-comment-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-compass"></i> las la-compass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-closed"></i> las la-door-closed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-door-open"></i> las la-door-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation"></i> las la-exclamation
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation-circle"></i> las la-exclamation-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-exclamation-triangle"></i> las la-exclamation-triangle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye"></i> las la-eye
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-eye-slash"></i> las la-eye-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file"></i> las la-file
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-file-alt"></i> las la-file-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder"></i> las la-folder
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-folder-open"></i> las la-folder-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-gas-pump"></i> las la-gas-pump
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-info"></i> las la-info
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-info-circle"></i> las la-info-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lightbulb"></i> las la-lightbulb
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lock"></i> las la-lock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-lock-open"></i> las la-lock-open
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker"></i> las la-map-marker
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marker-alt"></i> las la-map-marker-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone"></i> las la-microphone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt"></i> las la-microphone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-alt-slash"></i> las la-microphone-alt-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-microphone-slash"></i> las la-microphone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-minus"></i> las la-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-minus-circle"></i> las la-minus-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-minus-square"></i> las la-minus-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-parking"></i> las la-parking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone"></i> las la-phone
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-alt"></i> las la-phone-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-phone-slash"></i> las la-phone-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus"></i> las la-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus-circle"></i> las la-plus-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plus-square"></i> las la-plus-square
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-print"></i> las la-print
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-question"></i> las la-question
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-question-circle"></i> las la-question-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shield-alt"></i> las la-shield-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shopping-cart"></i> las la-shopping-cart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign-in-alt"></i> las la-sign-in-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sign-out-alt"></i> las la-sign-out-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-signal"></i> las la-signal
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smoking-ban"></i> las la-smoking-ban
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star"></i> las la-star
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star-half"></i> las la-star-half
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-star-half-alt"></i> las la-star-half-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-stream"></i> las la-stream
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thermometer-empty"></i> las la-thermometer-empty
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thermometer-full"></i> las la-thermometer-full
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thermometer-half"></i> las la-thermometer-half
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thermometer-quarter"></i> las la-thermometer-quarter
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thermometer-three-quarters"></i> las la-thermometer-three-quarters
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-down"></i> las la-thumbs-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-thumbs-up"></i> las la-thumbs-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tint"></i> las la-tint
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tint-slash"></i> las la-tint-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toggle-off"></i> las la-toggle-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-toggle-on"></i> las la-toggle-on
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-unlock"></i> las la-unlock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-unlock-alt"></i> las la-unlock-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user"></i> las la-user
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-alt"></i> las la-user-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-alt-slash"></i> las la-user-alt-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-slash"></i> las la-user-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-video"></i> las la-video
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-video-slash"></i> las la-video-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-down"></i> las la-volume-down
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-mute"></i> las la-volume-mute
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-off"></i> las la-volume-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-volume-up"></i> las la-volume-up
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wifi"></i> las la-wifi
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Religion</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-acquisitions-incorporated"></i> lab la-acquisitions-incorporated
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-book-dead"></i> las la-book-dead
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-critical-role"></i> lab la-critical-role
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-d-and-d"></i> lab la-d-and-d
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-d-and-d-beyond"></i> lab la-d-and-d-beyond
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-d20"></i> las la-dice-d20
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dice-d6"></i> las la-dice-d6
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dragon"></i> las la-dragon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dungeon"></i> las la-dungeon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-fantasy-flight-games"></i> lab la-fantasy-flight-games
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-fist-raised"></i> las la-fist-raised
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hat-wizard"></i> las la-hat-wizard
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-penny-arcade"></i> lab la-penny-arcade
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-ring"></i> las la-ring
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-scroll"></i> las la-scroll
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skull-crossbones"></i> las la-skull-crossbones
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-wizards-of-the-coast"></i> lab la-wizards-of-the-coast
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Travel</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-archway"></i> las la-archway
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-atlas"></i> las la-atlas
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bed"></i> las la-bed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bus"></i> las la-bus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bus-alt"></i> las la-bus-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cocktail"></i> las la-cocktail
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-concierge-bell"></i> las la-concierge-bell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-dumbbell"></i> las la-dumbbell
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini"></i> las la-glass-martini
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-martini-alt"></i> las la-glass-martini-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe-africa"></i> las la-globe-africa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe-americas"></i> las la-globe-americas
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe-asia"></i> las la-globe-asia
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-globe-europe"></i> las la-globe-europe
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hot-tub"></i> las la-hot-tub
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hotel"></i> las la-hotel
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-luggage-cart"></i> las la-luggage-cart
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map"></i> las la-map
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marked"></i> las la-map-marked
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-map-marked-alt"></i> las la-map-marked-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-monument"></i> las la-monument
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-passport"></i> las la-passport
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plane"></i> las la-plane
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plane-arrival"></i> las la-plane-arrival
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-plane-departure"></i> las la-plane-departure
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-shuttle-van"></i> las la-shuttle-van
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-spa"></i> las la-spa
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-suitcase"></i> las la-suitcase
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-suitcase-rolling"></i> las la-suitcase-rolling
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swimmer"></i> las la-swimmer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swimming-pool"></i> las la-swimming-pool
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-taxi"></i> las la-taxi
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tram"></i> las la-tram
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tv"></i> las la-tv
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-umbrella-beach"></i> las la-umbrella-beach
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-glass"></i> las la-wine-glass
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wine-glass-alt"></i> las la-wine-glass-alt
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Users & People</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="lab la-accessible-icon"></i> lab la-accessible-icon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-address-book"></i> las la-address-book
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-address-card"></i> las la-address-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-baby"></i> las la-baby
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bed"></i> las la-bed
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-biking"></i> las la-biking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-blind"></i> las la-blind
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-chalkboard-teacher"></i> las la-chalkboard-teacher
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-child"></i> las la-child
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-female"></i> las la-female
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-frown"></i> las la-frown
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-hiking"></i> las la-hiking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-badge"></i> las la-id-badge
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-card"></i> las la-id-card
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-id-card-alt"></i> las la-id-card-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-male"></i> las la-male
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-meh"></i> las la-meh
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-people-carry"></i> las la-people-carry
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-person-booth"></i> las la-person-booth
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poo"></i> las la-poo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-portrait"></i> las la-portrait
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-power-off"></i> las la-power-off
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-pray"></i> las la-pray
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-restroom"></i> las la-restroom
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-running"></i> las la-running
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skating"></i> las la-skating
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skiing"></i> las la-skiing
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skiing-nordic"></i> las la-skiing-nordic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smile"></i> las la-smile
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowboarding"></i> las la-snowboarding
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-street-view"></i> las la-street-view
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-swimmer"></i> las la-swimmer
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user"></i> las la-user
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-alt"></i> las la-user-alt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-alt-slash"></i> las la-user-alt-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-astronaut"></i> las la-user-astronaut
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-check"></i> las la-user-check
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-circle"></i> las la-user-circle
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-clock"></i> las la-user-clock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-cog"></i> las la-user-cog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-edit"></i> las la-user-edit
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-friends"></i> las la-user-friends
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-graduate"></i> las la-user-graduate
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-injured"></i> las la-user-injured
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-lock"></i> las la-user-lock
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-md"></i> las la-user-md
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-minus"></i> las la-user-minus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-ninja"></i> las la-user-ninja
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-nurse"></i> las la-user-nurse
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-plus"></i> las la-user-plus
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-secret"></i> las la-user-secret
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-shield"></i> las la-user-shield
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-slash"></i> las la-user-slash
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-tag"></i> las la-user-tag
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-tie"></i> las la-user-tie
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-user-times"></i> las la-user-times
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-users"></i> las la-users
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-users-cog"></i> las la-users-cog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-walking"></i> las la-walking
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wheelchair"></i> las la-wheelchair
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Weather</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-bolt"></i> las la-bolt
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud"></i> las la-cloud
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-meatball"></i> las la-cloud-meatball
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-moon"></i> las la-cloud-moon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-moon-rain"></i> las la-cloud-moon-rain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-rain"></i> las la-cloud-rain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-showers-heavy"></i> las la-cloud-showers-heavy
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-sun"></i> las la-cloud-sun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-cloud-sun-rain"></i> las la-cloud-sun-rain
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-meteor"></i> las la-meteor
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-moon"></i> las la-moon
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-poo-storm"></i> las la-poo-storm
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-rainbow"></i> las la-rainbow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-smog"></i> las la-smog
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowflake"></i> las la-snowflake
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-sun"></i> las la-sun
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-temperature-high"></i> las la-temperature-high
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-temperature-low"></i> las la-temperature-low
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-umbrella"></i> las la-umbrella
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-water"></i> las la-water
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-wind"></i> las la-wind
                        </div>
                    </div>


                    <h6 class="text-uppercase text-muted fw-semibold mt-4">Winter</h6>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-glass-whiskey"></i> las la-glass-whiskey
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-icicles"></i> las la-icicles
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-igloo"></i> las la-igloo
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-mitten"></i> las la-mitten
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skating"></i> las la-skating
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skiing"></i> las la-skiing
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-skiing-nordic"></i> las la-skiing-nordic
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowboarding"></i> las la-snowboarding
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-snowplow"></i> las la-snowplow
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <i class="las la-tram"></i> las la-tram
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
