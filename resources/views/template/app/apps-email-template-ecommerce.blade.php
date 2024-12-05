@extends('layouts.master')
@section('title')
    @lang('translation.ecommerce-action')
@endsection
@section('css')
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.email')
        @endslot
        @slot('li_3')
            @lang('translation.email-templates')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 class="mb-0 pb-1 text-decoration-underline">Invoice Action</h5>
            </div>
        </div>
        <!--end col-->
        <div class="col-12">
            <table class="body-wrap"
                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                        valign="top"></td>
                    <td class="container" width="600"
                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                        valign="top">
                        <div class="content"
                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope
                                itemtype="http://schema.org/ConfirmAction"
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                                    <td class="content-wrap"
                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: #fff;"
                                        valign="top">
                                        <meta itemprop="name" content="Confirm Email"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                        <table width="100%" cellpadding="0" cellspacing="0"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 24px; vertical-align: top; margin: 0; padding: 0 0 10px; text-align: center;"
                                                    valign="top">
                                                    <h4
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 10px; font-weight: 600;">
                                                        Your order has been placed</h5>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 12px;"
                                                    valign="top">
                                                    <h5 style="font-family: 'Roboto', sans-serif; margin-bottom: 3px;">Hey,
                                                        Anna Adame</h5>
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 8px; color: #878a99;">
                                                        Your order has been confirmed and will be shipping soon.</p>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 18px;"
                                                    valign="top">
                                                    <table style="width:100%;">
                                                        <tbody>
                                                            <tr style="text-align: left;">
                                                                <th style="padding: 5px;">
                                                                    <p
                                                                        style="color: #878a99; font-size: 13px; margin-bottom: 2px; font-weight: 400;">
                                                                        Order Number</p>
                                                                    <span>VZ14524742541</span>
                                                                </th>
                                                                <th style="padding: 5px;">
                                                                    <p
                                                                        style="color: #878a99; font-size: 13px; margin-bottom: 2px; font-weight: 400;">
                                                                        Order Date</p>
                                                                    <span>05 April, 2022</span>
                                                                </th>
                                                                <th style="padding: 5px;">
                                                                    <p
                                                                        style="color: #878a99; font-size: 13px; margin-bottom: 2px; font-weight: 400;">
                                                                        Payment Method</p>
                                                                    <span>Viss - 4622</span>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 12px;"
                                                    valign="top">
                                                    <h6
                                                        style="font-family: 'Roboto', sans-serif; font-size: 15px; text-decoration-line: underline;margin-bottom: 15px;">
                                                        Her'e what you ordered:</h6>
                                                    <table style="width:100%;" cellspacing="0" cellpadding="0">
                                                        <thead style="text-align: left;">
                                                            <th style="padding: 8px;border-bottom: 1px solid #e9ebec;">
                                                                Product Details</th>
                                                            <th style="padding: 8px;border-bottom: 1px solid #e9ebec;">
                                                                Quantity</th>
                                                            <th style="padding: 8px;border-bottom: 1px solid #e9ebec;">
                                                                Amount</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 8px; font-size: 13px;">
                                                                    <h6 style="margin-bottom: 2px; font-size: 14px;">
                                                                        Sweatshirt for Men (Pink)</h6>
                                                                    <p
                                                                        style="margin-bottom: 2px; font-size: 13px; color: #878a99;">
                                                                        Graphic Print Men & Women Sweatshirt</p>
                                                                </td>
                                                                <td style="padding: 8px; font-size: 13px;">
                                                                    02
                                                                </td>
                                                                <td style="padding: 8px; font-size: 13px;">
                                                                    $239.98
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 8px; font-size: 13px;">
                                                                    <h6 style="margin-bottom: 2px; font-size: 14px;">Noise
                                                                        NoiseFit Endure Smart Watch</h6>
                                                                    <p
                                                                        style="margin-bottom: 2px; font-size: 13px; color: #878a99;">
                                                                        32.5mm (1.28 Inch) TFT Color Touch Display</p>
                                                                </td>
                                                                <td style="padding: 8px; font-size: 13px;">
                                                                    01
                                                                </td>
                                                                <td style="padding: 8px; font-size: 13px;">
                                                                    $94.99
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding: 8px; font-size: 13px; text-align: end;border-top: 1px solid #e9ebec;">
                                                                    Subtotal
                                                                </td>
                                                                <th
                                                                    style="padding: 8px; font-size: 13px;border-top: 1px solid #e9ebec;">
                                                                    $334.97
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding: 8px; font-size: 13px; text-align: end;">
                                                                    Shipping Charge
                                                                </td>
                                                                <th style="padding: 8px; font-size: 13px;">
                                                                    $9.50
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding: 8px; font-size: 13px; text-align: end;">
                                                                    Taxs
                                                                </td>
                                                                <th style="padding: 8px; font-size: 13px;">
                                                                    $15.26
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding: 8px; font-size: 13px; text-align: end;">
                                                                    Discount
                                                                </td>
                                                                <th style="padding: 8px; font-size: 13px;">
                                                                    $20.78
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding: 8px; font-size: 13px; text-align: end;border-top: 1px solid #e9ebec;">
                                                                    Total Amount
                                                                </td>
                                                                <th
                                                                    style="padding: 8px; font-size: 13px;border-top: 1px solid #e9ebec;">
                                                                    $338.95
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 0px;"
                                                    valign="top">
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 8px; color: #878a99;">
                                                        Wl'll send you shipping confirmation when your item(s) are on the
                                                        way! We appreciate your business, and hope you enjoy your purchase.
                                                    </p>
                                                    <h6
                                                        style="font-family: 'Roboto', sans-serif; font-size: 14px; margin-bottom: 0px; text-align: end;">
                                                        Thank you!</h6>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <div style="margin-top: 32px; text-align: center;">
                                <a href="#" itemprop="url"
                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: .8125rem; color: #FFF; text-decoration: none; font-weight: 400; text-align: center; cursor: pointer; display: inline-block; border-radius: .25rem; text-transform: capitalize; background-color: #405189; margin: 0; border-color: #405189; border-style: solid; border-width: 1px; padding: .5rem .9rem;">Download</a>
                                <a href="#" itemprop="url"
                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: .8125rem; color: #FFF; text-decoration: none; font-weight: 400; text-align: center; cursor: pointer; display: inline-block; border-radius: .25rem; text-transform: capitalize; background-color: #0ab39c; margin: 0; border-color: #0ab39c; border-style: solid; border-width: 1px; padding: .5rem .9rem;">Back
                                    to Shop</a>
                            </div>
                            <div style="text-align: center; margin: 28px auto 0px auto;">
                                <p style="font-family: 'Roboto', sans-serif; font-size: 14px;color: #98a6ad; margin: 0px;">
                                    2022 Velzon. Design & Develop by Themesbrand</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <!-- end table -->
        </div>
        <!--end col-->
    </div><!-- end row -->


    <div class="row">
        <div class="col-lg-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 class="mb-0 pb-1 text-decoration-underline">Feedback Action</h5>
            </div>
        </div>
        <!--end col-->
        <div class="col-12">
            <table class="body-wrap"
                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                        valign="top"></td>
                    <td class="container" width="600"
                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                        valign="top">
                        <div class="content"
                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action"
                                itemscope itemtype="http://schema.org/ConfirmAction"
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                                    <td class="content-wrap"
                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: #fff;"
                                        valign="top">
                                        <meta itemprop="name" content="Confirm Email"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                        <table width="100%" cellpadding="0" cellspacing="0"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 22px; vertical-align: top; margin: 0; padding: 0 0 3px; text-align: center;"
                                                    valign="top">
                                                    <div style="color: #f7b84b;">
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0;"
                                                    valign="top">
                                                    <h3
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 18px; text-align: center;line-height: 1.5;">
                                                        Good design & good support. Go for it</h5>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 15px; vertical-align:     top; margin: 0; padding: 0 0 0px;"
                                                    valign="top">
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 8px; color: #878a99;line-height: 1.5;">
                                                        Dear valuable Customer,</p>
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 8px; color: #878a99;line-height: 1.5;">
                                                        Thank you so much for providing 5 stars review It really means a lot
                                                        to us. Your review motivates us to work even hard and provide
                                                        top-notch features, support, and updates. You can share more details
                                                        via the contact us so we can provide the best from our side in
                                                        future updates. We are going to release the Vue and React version
                                                        asap.</p>
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; margin-bottom: 8px; color: #878a99;line-height: 1.5;">
                                                        Feel free to get in touch with us anytime via support from the link
                                                        below. <a
                                                            href="https://themeforest.net/item/velzon-aspnet-core-admin-dashboard-template/36077495/support"
                                                            target="_blank">https://themeforest.net/item/velzon-aspnet-core-admin-dashboard-template/36077495/support</a>
                                                    </p>
                                                    <h6
                                                        style="font-family: 'Roboto', sans-serif; font-size: 14px; margin-bottom: 0px; text-align: end;">
                                                        Thank you!</h6>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="text-align: center; margin: 28px auto 0px auto;">
                                <p style="font-family: 'Roboto', sans-serif; font-size: 14px;color: #98a6ad; margin: 0px;">
                                    2022 Velzon. Design & Develop by Themesbrand</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table><!-- end table -->
        </div>
        <!--end col-->
    </div><!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 class="mb-0 pb-1 text-decoration-underline">Rating and Review Email Template</h5>
            </div>
        </div>
        <!--end col-->
        <div class="col-12">
            <table class="body-wrap"
                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                        valign="top"></td>
                    <td class="container" width="600"
                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                        valign="top">
                        <div class="content"
                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action"
                                itemscope itemtype="http://schema.org/ConfirmAction"
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                                    <td class="content-wrap"
                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: #fff;overflow: hidden;"
                                        valign="top">
                                        <meta itemprop="name" content="Confirm Email"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                        <div
                                            style="padding: 20px;box-sizing: border-box; text-align: center; background-image: linear-gradient(to right, #405189, #405189);">
                                            <h6
                                                style="font-family: 'Roboto', sans-serif;margin: 0; font-size: 15px;color: #fff;text-transform: uppercase;">
                                                FREE 1-2 day shipping on orders over $32</h6>
                                        </div>
                                        <div
                                            style="padding: 20px;box-sizing: border-box; text-align: center; border-bottom: 1px solid #e9ebec;">
                                            <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt=""
                                                height="23">
                                        </div>
                                        <div style="padding: 20px;box-sizing: border-box; text-align: center;">
                                            <h5
                                                style="font-family: 'Roboto', sans-serif;margin-bottom: 10px;font-weight: 500;">
                                                What did you think of your recent purchase?</h5>
                                            <div style="color: #f7b84b;font-size: 17px;">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                            </div>
                                            <p
                                                style="font-size: 14px;color: #98a6ad;border-bottom: 1px solid #e9ebec;padding-bottom: 18px;">
                                                We'd love to hear how you and your pet enjoyed these products. Please leave
                                                a reviews so we can share it with other pet parents just like you.</p>

                                            <table style="width:100%;font-family: 'Roboto', sans-serif;">
                                                <tbody>
                                                    <tr style="text-align: left;">
                                                        <th style="padding: 5px;width: 110px;">
                                                            <img src="{{ URL::asset('build/images/products/img-3.png') }}"
                                                                alt="" height="80">
                                                        </th>
                                                        <th style="padding: 5px;">
                                                            <h6
                                                                style="font-family: 'Roboto', sans-serif; font-size: 14px; margin-bottom: 2px; font-weight: 500;">
                                                                350 ml Glass Grocery Container</h6>
                                                            <p
                                                                style="color: #878a99; font-weight: 400;margin-bottom: 5px;line-height: 1.5;font-size: 12px;">
                                                                Category : Grocery</p>
                                                            <a href="#" itemprop="url"
                                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: .710rem;font-weight: 400; color: #FFF; text-decoration: none; text-align: center; cursor: pointer; display: inline-block; border-radius: .25rem; text-transform: capitalize; background-color: #0ab39c; margin: 0; border-color: #0ab39c; border-style: solid; border-width: 1px; padding: .25rem .5rem;"
                                                                onMouseOver="this.style.background='#099885'"
                                                                onMouseOut="this.style.background='#0ab39c'">Write a Review
                                                                &#8594;</a>
                                                        </th>
                                                    </tr>
                                                    <tr style="text-align: left;">
                                                        <th style="padding: 5px;width: 110px;">
                                                            <img src="{{ URL::asset('build/images/products/img-2.png') }}"
                                                                alt="" height="80">
                                                        </th>
                                                        <th style="padding: 5px;">
                                                            <h6
                                                                style="font-family: 'Roboto', sans-serif; font-size: 14px; margin-bottom: 2px; font-weight: 500;">
                                                                Urban Ladder Pashe Chair</h6>
                                                            <p
                                                                style="color: #878a99; font-weight: 400;margin-bottom: 5px;line-height: 1.5;font-size: 12px;">
                                                                Category : Furniture</p>
                                                            <a href="#" itemprop="url"
                                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: .710rem;font-weight: 400; color: #FFF; text-decoration: none; text-align: center; cursor: pointer; display: inline-block; border-radius: .25rem; text-transform: capitalize; background-color: #0ab39c; margin: 0; border-color: #0ab39c; border-style: solid; border-width: 1px; padding: .25rem .5rem;"
                                                                onMouseOver="this.style.background='#099885'"
                                                                onMouseOut="this.style.background='#0ab39c'">Write a Review
                                                                &#8594;</a>
                                                        </th>
                                                    </tr>
                                                    <tr style="text-align: left;">
                                                        <th style="padding: 5px;width: 110px;">
                                                            <img src="{{ URL::asset('build/images/products/img-1.png') }}"
                                                                alt="" height="80">
                                                        </th>
                                                        <th style="padding: 5px;">
                                                            <h6
                                                                style="font-family: 'Roboto', sans-serif; font-size: 14px; margin-bottom: 2px; font-weight: 500;">
                                                                Half Sleeve Round Neck T-Shirts</h6>
                                                            <p
                                                                style="color: #878a99; font-weight: 400;margin-bottom: 5px;line-height: 1.5;font-size: 12px;">
                                                                Category : Fashion</p>
                                                            <a href="#" itemprop="url"
                                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: .710rem;font-weight: 400; color: #FFF; text-decoration: none; text-align: center; cursor: pointer; display: inline-block; border-radius: .25rem; text-transform: capitalize; background-color: #0ab39c; margin: 0; border-color: #0ab39c; border-style: solid; border-width: 1px; padding: .25rem .5rem;"
                                                                onMouseOver="this.style.background='#099885'"
                                                                onMouseOut="this.style.background='#0ab39c'">Write a Review
                                                                &#8594;</a>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div
                                            style="padding: 20px;box-sizing: border-box; text-align: center; background-color: rgba(240,101,72,.1);">
                                            <h6
                                                style="font-family: 'Roboto', sans-serif;margin: 0; font-size: 15px;text-transform: uppercase;color: #f06548;">
                                                Call us 24/7 at 1-2345-678-9123</h6>
                                        </div>
                                        <div style="padding: 20px;box-sizing: border-box; text-align: center;">
                                            <p
                                                style="font-family: 'Roboto', sans-serif;margin-bottom: 0px;font-weight: 500;color: #98a6ad;">
                                                Review text is a text that contains reviews, ratings or reviews of a work
                                                such as a film, drama, or a book.</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div style="text-align: center; margin: 28px auto 0px auto;">
                                <p style="font-family: 'Roboto', sans-serif; font-size: 14px;color: #98a6ad; margin: 0px;">
                                    2022 Velzon. Design & Develop by Themesbrand</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!--end col-->
    </div><!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
