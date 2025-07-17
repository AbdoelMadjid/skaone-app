@extends('layouts.master')
@section('title')
    @lang('translation.modul-ajar-pdf')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.administrasi-guru')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body checkout-tab">

                    <form action="#">
                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                            <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#info" role="tab"
                                        aria-selected="false">
                                        <i class="ri-briefcase-line align-middle me-1"></i> Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kerangka-tujuan" role="tab"
                                        aria-selected="false">
                                        <i class="ri-stack-line me-1 align-middle"></i> Kerangka dan Tujuan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#komponen" role="tab"
                                        aria-selected="false">
                                        <i class="ri-git-repository-line align-middle me-1"></i>Komponen
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#lampiran" role="tab"
                                        aria-selected="false">
                                        <i class="ri-file-copy-line align-middle me-1"></i>Lampiran
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel"
                                aria-labelledby="info-tab">
                                <div>
                                    <h5 class="mb-1">A. INFORMASI UMUM</h5>
                                    <p class="text-muted mb-4">Identitas Modul</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="country" class="form-label">Jenjang</label>
                                                <select class="form-select" id="jenjang" data-plugin="choices">
                                                    <option value="">Pilih jenjang...</option>
                                                    <option selected>SMK</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">Fase</label>
                                                <select class="form-select" id="fase" data-plugin="choices">
                                                    <option value="">Pilih Fase...</option>
                                                    <option value="E">Fase E</option>
                                                    <option value="F">Fase F</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">Kelas</label>
                                                <select class="form-select" id="kelas" data-plugin="choices" disabled>
                                                    <option value="">Pilih Kelas...</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">Bidang Keahlian</label>
                                                <select class="form-select" id="bidangkeahlian" data-plugin="choices"
                                                    disabled>
                                                    <option value="">Pilih Bidang Keahlian...</option>
                                                    <option value="BM">Bisnis dan Manajemen</option>
                                                    <option value="TI">Teknologi Informasi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">Program Keahlian</label>
                                                <select class="form-select" id="programkeahlian" data-plugin="choices"
                                                    disabled>
                                                    <option value="">Pilih Program Keahlian...</option>
                                                    <option value="BM-PM">Pemasaran</option>
                                                    <option value="BM-MPLB">Manajemen Perkantoran dan Layanan Bisnis
                                                    </option>
                                                    <option value="BM-AKL">Akuntansi dan Keuangan Lembaga</option>
                                                    <option value="TI-PPLG">Pengembangan Perangkat Lunak dan Gim</option>
                                                    <option value="TI-TJKT">Teknik Jaringan Komputer dan Telekomunikasi
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">Konsentrasi Keahlian</label>
                                                <select class="form-select" id="konsentrasikeahlian" data-plugin="choices"
                                                    disabled>
                                                    <option value="">Pilih Konsentrasi Keahlian...</option>
                                                    <option value="BM-PM-BD">Bisnis Digital</option>
                                                    <option value="BM-MPLB-MP">Manajemen Perkantoran
                                                    </option>
                                                    <option value="BM-AKL-AK">Akuntansi</option>
                                                    <option value="TI-PPLG-RPL">Rekayasa Perangkat Lunak</option>
                                                    <option value="TI-TJKT-TKJ">Teknik Komputer dan Jaringan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="billinginfo-address" class="form-label">Address</label>
                                        <textarea class="form-control" id="billinginfo-address" placeholder="Enter address" rows="3"></textarea>
                                    </div>



                                    <div class="d-flex align-items-start gap-3 mt-3">
                                        <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                            data-nexttab="pills-bill-address-tab"><i
                                                class="ri-truck-line label-icon align-middle fs-16 ms-2"></i>Proceed
                                            to Shipping</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="kerangka-tujuan" role="tabpanel"
                                aria-labelledby="kerangka-tujuan-tab">
                                <div>
                                    <h5 class="mb-1">Shipping Information</h5>
                                    <p class="text-muted mb-4">Please fill all information below</p>
                                </div>

                                <div class="mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-0">Saved Address</h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-success mb-3"
                                                data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                                Add Address
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-check card-radio">
                                                <input id="shippingAddress01" name="shippingAddress" type="radio"
                                                    class="form-check-input" checked>
                                                <label class="form-check-label" for="shippingAddress01">
                                                    <span class="mb-4 fw-semibold d-block text-muted text-uppercase">Home
                                                        Address</span>

                                                    <span class="fs-14 mb-2 d-block">Marcus
                                                        Alfaro</span>
                                                    <span class="text-muted fw-normal text-wrap mb-1 d-block">4739
                                                        Bubby Drive Austin, TX 78729</span>
                                                    <span class="text-muted fw-normal d-block">Mo.
                                                        012-345-6789</span>
                                                </label>
                                            </div>
                                            <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                                <div>
                                                    <a href="#" class="d-block text-body p-1 px-2"
                                                        data-bs-toggle="modal" data-bs-target="#addAddressModal"><i
                                                            class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                        Edit</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="d-block text-body p-1 px-2"
                                                        data-bs-toggle="modal" data-bs-target="#removeItemModal"><i
                                                            class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                        Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-check card-radio">
                                                <input id="shippingAddress02" name="shippingAddress" type="radio"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="shippingAddress02">
                                                    <span class="mb-4 fw-semibold d-block text-muted text-uppercase">Office
                                                        Address</span>

                                                    <span class="fs-14 mb-2 d-block">James Honda</span>
                                                    <span class="text-muted fw-normal text-wrap mb-1 d-block">1246
                                                        Virgil Street Pensacola, FL 32501
                                                    </span>
                                                    <span class="text-muted fw-normal d-block">Mo.
                                                        012-345-6789</span>
                                                </label>
                                            </div>
                                            <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                                <div>
                                                    <a href="#" class="d-block text-body p-1 px-2"
                                                        data-bs-toggle="modal" data-bs-target="#addAddressModal"><i
                                                            class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                        Edit</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="d-block text-body p-1 px-2"
                                                        data-bs-toggle="modal" data-bs-target="#removeItemModal"><i
                                                            class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                        Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="fs-14 mb-3">Shipping Method</h5>

                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-check card-radio">
                                                    <input id="shippingMethod01" name="shippingMethod" type="radio"
                                                        class="form-check-input" checked>
                                                    <label class="form-check-label" for="shippingMethod01">
                                                        <span
                                                            class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Free</span>
                                                        <span class="fs-14 mb-1 text-wrap d-block">Free
                                                            Delivery</span>
                                                        <span class="text-muted fw-normal text-wrap d-block">Expected
                                                            Delivery 3 to 5 Days</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check card-radio">
                                                    <input id="shippingMethod02" name="shippingMethod" type="radio"
                                                        class="form-check-input" checked>
                                                    <label class="form-check-label" for="shippingMethod02">
                                                        <span
                                                            class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">$24.99</span>
                                                        <span class="fs-14 mb-1 text-wrap d-block">Express
                                                            Delivery</span>
                                                        <span class="text-muted fw-normal text-wrap d-block">Delivery
                                                            within 24hrs.</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-info-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                        to Personal Info</button>
                                    <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                        data-nexttab="pills-payment-tab"><i
                                            class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue
                                        to Payment</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="komponen" role="tabpanel" aria-labelledby="komponen-tab">
                                <div>
                                    <h5 class="mb-1">Payment Selection</h5>
                                    <p class="text-muted mb-4">Please select and enter your billing
                                        information</p>
                                </div>

                                <div class="row g-4">
                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show"
                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod01" name="paymentMethod" type="radio"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="paymentMethod01">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-paypal-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Paypal</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse"
                                            aria-expanded="true" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod02" name="paymentMethod" type="radio"
                                                    class="form-check-input" checked>
                                                <label class="form-check-label" for="paymentMethod02">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-bank-card-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Credit / Debit
                                                        Card</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show"
                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod03" name="paymentMethod" type="radio"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="paymentMethod03">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-money-dollar-box-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Cash on
                                                        Delivery</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse show" id="paymentmethodCollapse">
                                    <div class="card p-4 border shadow-none mb-0 mt-4">
                                        <div class="row gy-3">
                                            <div class="col-md-12">
                                                <label for="cc-name" class="form-label">Name on
                                                    card</label>
                                                <input type="text" class="form-control" id="cc-name"
                                                    placeholder="Enter name">
                                                <small class="text-muted">Full name as displayed on
                                                    card</small>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="cc-number" class="form-label">Credit card
                                                    number</label>
                                                <input type="text" class="form-control" id="cc-number"
                                                    placeholder="xxxx xxxx xxxx xxxx">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-expiration" class="form-label">Expiration</label>
                                                <input type="text" class="form-control" id="cc-expiration"
                                                    placeholder="MM/YY">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-cvv" class="form-label">CVV</label>
                                                <input type="text" class="form-control" id="cc-cvv"
                                                    placeholder="xxx">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-muted mt-2 fst-italic">
                                        <i data-feather="lock" class="text-muted icon-xs"></i> Your
                                        transaction is secured with SSL encryption
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-address-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                        to Shipping</button>
                                    <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                        data-nexttab="pills-finish-tab"><i
                                            class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>Complete
                                        Order</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
                                <div class="text-center py-5">

                                    <div class="mb-4">
                                        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                            colors="primary:#0ab39c,secondary:#405189"
                                            style="width:120px;height:120px"></lord-icon>
                                    </div>
                                    <h5>Thank you ! Your Order is Completed !</h5>
                                    <p class="text-muted">You will receive an order confirmation email
                                        with
                                        details of your order.</p>

                                    <h3 class="fw-semibold">Order ID: <a href="/apps_ecommerce_order_details"
                                            class="text-decoration-underline">VZ2451</a></h3>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Tampil Modul Ajar</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class='text-center'> MODUL AJAR </h4>
                    <div id="modulPreview" class="text-center text-uppercase mt-3">
                        SMK FASE ... - KELAS ...

                        Bidang Keahlian : <span id="previewBidang">...</span><br>
                        Program Keahlian : <span id="previewProgram">...</span><br>
                        Konsentrasi Keahlian : <span id="previewKonsentrasi">...</span>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faseSelect = document.getElementById('fase');
            const kelasSelect = document.getElementById('kelas');
            const bidangKeahlianSelect = document.getElementById('bidangkeahlian');
            const programKeahlianSelect = document.getElementById('programkeahlian');
            const konsentrasiKeahlianSelect = document.getElementById('konsentrasikeahlian');

            const kelasOptions = {
                'E': ['X'],
                'F': ['XI', 'XII']
            };

            const programKeahlianMap = {
                'BM': [{
                        value: 'BM-PM',
                        text: 'Pemasaran'
                    },
                    {
                        value: 'BM-MPLB',
                        text: 'Manajemen Perkantoran dan Layanan Bisnis'
                    }
                ],
                'TI': [{
                        value: 'BM-AKL',
                        text: 'Akuntansi dan Keuangan Lembaga'
                    },
                    {
                        value: 'TI-PPLG',
                        text: 'Pengembangan Perangkat Lunak dan Gim'
                    },
                    {
                        value: 'TI-TJKT',
                        text: 'Teknik Jaringan Komputer dan Telekomunikasi'
                    }
                ]
            };

            const konsentrasiKeahlianMap = {
                'BM-PM': [{
                    value: 'BM-PM-BD',
                    text: 'Bisnis Digital'
                }],
                'BM-MPLB': [{
                    value: 'BM-MPLB-MP',
                    text: 'Manajemen Perkantoran'
                }],
                'BM-AKL': [{
                    value: 'BM-AKL-AK',
                    text: 'Akuntansi'
                }],
                'TI-PPLG': [{
                    value: 'TI-PPLG-RPL',
                    text: 'Rekayasa Perangkat Lunak'
                }],
                'TI-TJKT': [{
                    value: 'TI-TJKT-TKJ',
                    text: 'Teknik Komputer dan Jaringan'
                }]
            };

            function setDisabled(select, state) {
                select.disabled = state;
            }

            function populateOptions(select, items, placeholder = 'Pilih...') {
                select.innerHTML = `<option value="">${placeholder}</option>`;
                items.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.value;
                    option.textContent = item.text;
                    select.appendChild(option);
                });
            }

            // STEP 1: FASE → KELAS
            faseSelect.addEventListener('change', function() {
                const fase = this.value;
                kelasSelect.innerHTML = '<option value="">Pilih Kelas...</option>';
                setDisabled(kelasSelect, !fase);
                if (fase && kelasOptions[fase]) {
                    kelasOptions[fase].forEach(kelas => {
                        const opt = document.createElement('option');
                        opt.value = kelas;
                        opt.textContent = 'Kelas ' + kelas;
                        kelasSelect.appendChild(opt);
                    });
                }

                // Reset selanjutnya
                setDisabled(bidangKeahlianSelect, true);
                setDisabled(programKeahlianSelect, true);
                setDisabled(konsentrasiKeahlianSelect, true);
            });

            // STEP 2: KELAS → Aktifkan BIDANG KEAHLIAN
            kelasSelect.addEventListener('change', function() {
                const kelas = this.value;
                setDisabled(bidangKeahlianSelect, !kelas);

                // Reset yang di bawahnya
                setDisabled(programKeahlianSelect, true);
                setDisabled(konsentrasiKeahlianSelect, true);
            });

            // STEP 3: BIDANG KEAHLIAN → PROGRAM KEAHLIAN
            bidangKeahlianSelect.addEventListener('change', function() {
                const bidang = this.value;
                if (bidang && programKeahlianMap[bidang]) {
                    populateOptions(programKeahlianSelect, programKeahlianMap[bidang],
                        'Pilih Program Keahlian...');
                    setDisabled(programKeahlianSelect, false);
                } else {
                    setDisabled(programKeahlianSelect, true);
                }

                setDisabled(konsentrasiKeahlianSelect, true);
            });

            // STEP 4: PROGRAM KEAHLIAN → KONSENTRASI KEAHLIAN
            programKeahlianSelect.addEventListener('change', function() {
                const prog = this.value;
                if (prog && konsentrasiKeahlianMap[prog]) {
                    populateOptions(konsentrasiKeahlianSelect, konsentrasiKeahlianMap[prog],
                        'Pilih Konsentrasi Keahlian...');
                    setDisabled(konsentrasiKeahlianSelect, false);
                } else {
                    setDisabled(konsentrasiKeahlianSelect, true);
                }
            });

            // INIT disable semua dulu kecuali fase
            setDisabled(kelasSelect, true);
            setDisabled(bidangKeahlianSelect, true);
            setDisabled(programKeahlianSelect, true);
            setDisabled(konsentrasiKeahlianSelect, true);

            // UPDATE modulPreview setiap kali fase atau kelas berubah
            function updateModulPreview() {
                const fase = faseSelect.value ? faseSelect.value.toUpperCase() : '...';
                const kelas = kelasSelect.value ? kelasSelect.value.toUpperCase() : '...';

                const bidang = bidangKeahlianSelect.options[bidangKeahlianSelect.selectedIndex]?.text ?? '...';
                const program = programKeahlianSelect.options[programKeahlianSelect.selectedIndex]?.text ?? '...';
                const konsentrasi = konsentrasiKeahlianSelect.options[konsentrasiKeahlianSelect.selectedIndex]
                    ?.text ?? '...';

                const preview = document.getElementById('modulPreview');
                preview.innerHTML = `
        SMK FASE ${fase} - KELAS ${kelas}
        <br><br>
        Bidang Keahlian : <span id="previewBidang">${bidang}</span><br>
        Program Keahlian : <span id="previewProgram">${program}</span><br>
        Konsentrasi Keahlian : <span id="previewKonsentrasi">${konsentrasi}</span>
    `;
            }

            faseSelect.addEventListener('change', updateModulPreview);
            kelasSelect.addEventListener('change', updateModulPreview);
            bidangKeahlianSelect.addEventListener('change', updateModulPreview);
            programKeahlianSelect.addEventListener('change', updateModulPreview);
            konsentrasiKeahlianSelect.addEventListener('change', updateModulPreview);

            // Panggil juga di awal untuk inisialisasi jika perlu
            updateModulPreview();
        });
    </script>



    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
