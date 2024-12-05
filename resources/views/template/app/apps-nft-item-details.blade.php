@extends('layouts.master')
@section('title')
    @lang('translation.item-details')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.nft-marketplace')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="sticky-side-div">
                        <div class="card ribbon-box border shadow-none right">
                            <div class="ribbon-two ribbon-two-danger"><span><i class="ri-fire-fill align-bottom"></i>
                                    Hot</span></div>
                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <div class="position-absolute bottom-0 p-3">
                                <div class="position-absolute top-0 end-0 start-0 bottom-0 bg-white opacity-25"></div>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img src="{{ URL::asset('build/images/nft/img-02.jpg') }}" alt=""
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="col-3">
                                        <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                                            class="img-fluid rounded h-100 object-fit-cover">
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-2">
                            <button class="btn btn-success w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-8">
                    <div>
                        <div class="dropdown float-end">
                            <button class="btn btn-ghost-primary btn-icon dropdown" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-fill align-middle fs-16"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item view-item-btn" href="javascript:void(0);"><i
                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>View</a></li>
                                <li><a class="dropdown-item edit-item-btn" href="#!"><i
                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                <li><a class="dropdown-item remove-item-btn" href="#!"><i
                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                            </ul>
                        </div>
                        <span class="badge bg-info-subtle text-info mb-3 fs-12"><i
                                class="ri-eye-line me-1 align-bottom"></i> 8,634 people views this</span>
                        <h4>Patterns Arts & Culture</h4>
                        <div class="hstack gap-3 flex-wrap">
                            <div class="text-muted">Creators : <a href="#" class="text-primary fw-medium">Nancy
                                    Martino</a></div>
                            <div class="vr"></div>
                            <div class="text-muted">Seller : <span class="text-body fw-medium">Rickey Teran</span></div>
                            <div class="vr"></div>
                            <div class="text-muted">Published : <span class="text-body fw-medium">29 April, 2022</span>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                            <div class="text-muted fs-16">
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                            </div>
                            <div class="text-muted">( 5.50k Customer Review )</div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Price :</p>
                                        <h5 class="fs-17 text-success mb-0"><i class="mdi mdi-ethereum me-1"></i> 83.06 ETH
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Highest bid</p>
                                        <h5 class="fs-17 mb-0">104.63 ETH</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Stock</p>
                                        <h5 class="fs-17 mb-0">12/58 Sale</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Auction Ends:</p>
                                        <h5 id="auction-time-1" class="mb-0"></h5>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!--end row-->
                        <div class="mt-4 text-muted">
                            <h5 class="fs-14">Description :</h5>
                            <p>Cultural patterns are the similar behaviors within similar situations we witness due to
                                shared beliefs, values, norms and social practices that are steady over time. In art, a
                                pattern is a repetition of specific visual elements. The dictionary.com definition of
                                "pattern" is: an arrangement of repeated or corresponding parts, decorative motifs, etc.</p>
                        </div>
                        <div class="product-content mt-5">
                            <h5 class="fs-14 mb-3">Product Description :</h5>
                            <nav>
                                <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci"
                                            role="tab" aria-controls="nav-speci" aria-selected="true">Place Bids</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="nav-additional-tab" data-bs-toggle="tab"
                                            href="#nav-additional" role="tab" aria-controls="nav-additional"
                                            aria-selected="false">Additional Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail"
                                            role="tab" aria-controls="nav-detail" aria-selected="false">Details</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-speci" role="tabpanel"
                                    aria-labelledby="nav-speci-tab">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ URL::asset('build/images/nft/img-01.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <a href="/apps_nft_item_details" class="text-body"><span
                                                                    class="mb-0 ms-2">Brave Tigers NFT</span></a>
                                                        </div>
                                                    </th>
                                                    <td>0.235 ETH</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ URL::asset('build/images/users/avatar-1.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <div class="ms-2">
                                                                <a href="#!">
                                                                    <h6 class="mb-1">Alexis Clarke</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">Creators</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>29 min ago</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <a href="/apps_nft_item_details" class="text-body"><span
                                                                    class="mb-0 ms-2">Creative filtered portrait</span></a>
                                                        </div>
                                                    </th>
                                                    <td>571.24 ETH</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <div class="ms-2">
                                                                <a href="#!">
                                                                    <h6 class="mb-1">Glen Matney</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">Creators</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>37 min ago</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://img.themesbrand.com/velzon/images/img-4.gif"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <a href="/apps_nft_item_details" class="text-body"><span
                                                                    class="mb-0 ms-2">Evolved Reality</span></a>
                                                        </div>
                                                    </th>
                                                    <td>130.39 ETH</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <div class="ms-2">
                                                                <a href="#!">
                                                                    <h6 class="mb-1">Herbert Stokes</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">Creators</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>1 hrs ago</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <a href="/apps_nft_item_details" class="text-body"><span
                                                                    class="mb-0 ms-2">Robotic Body Art</span></a>
                                                        </div>
                                                    </th>
                                                    <td>81.72 ETH</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded object-fit-cover" />
                                                            <div class="ms-2">
                                                                <a href="#!">
                                                                    <h6 class="mb-1">Michael Morris</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">Creators</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>1 hrs ago</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-additional" role="tabpanel"
                                    aria-labelledby="nav-additional-tab">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Size</th>
                                                    <td>650 x 650px (66.8 KB)</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Brand</th>
                                                    <td>Patterns arts & culture </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Formats</th>
                                                    <td>JPEG / PNG / PDF</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Token</th>
                                                    <td>VLZ74516523</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Blockchain</th>
                                                    <td>Ethereum</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Contacts</th>
                                                    <td>E545D145S5646544DS541SFDB213C5Z</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-detail" role="tabpanel"
                                    aria-labelledby="nav-detail-tab">
                                    <div>
                                        <h5 class="font-size-16 mb-3">Patterns arts & culture</h5>
                                        <p>Cultural patterns are the similar behaviors within similar situations we witness
                                            due to shared beliefs, values, norms and social practices that are steady over
                                            time. In art, a pattern is a repetition of specific visual elements. The
                                            dictionary.com definition of "pattern" is: an arrangement of repeated or
                                            corresponding parts, decorative motifs, etc.</p>
                                        <div>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> On
                                                digital or printed media</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> For
                                                commercial and personal projects</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> From
                                                anywhere in the world</p>
                                            <p class="mb-0"><i
                                                    class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Full
                                                copyrights sale</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div>
                                <h5 class="fs-14 mb-3">Ratings & Reviews</h5>
                            </div>
                            <div class="row gy-4 gx-0">
                                <div class="col-lg-4">
                                    <div>
                                        <div class="pb-3">
                                            <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <div class="fs-16 align-middle text-warning">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h6 class="mb-0">4.8 out of 5</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-muted">Total <span class="fw-medium">7.32k</span> reviews
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">5 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 50.16%" aria-valuenow="50.16"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">2758</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">4 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 19.32%" aria-valuenow="19.32"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">1063</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">3 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 18.12%" aria-valuenow="18.12"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">997</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">2 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 7.42%" aria-valuenow="7.42"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">408</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">1 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 4.98%" aria-valuenow="4.98"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">274</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-8">
                                    <div class="ps-lg-4">
                                        <div class="d-flex flex-wrap align-items-start gap-3">
                                            <h5 class="fs-14">Reviews: </h5>
                                        </div>

                                        <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                            <ul class="list-unstyled mb-0">
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="text-warning">
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star"></i>
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="mb-0"> Superb Artwork</h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-grow-1 gap-2 mb-3">
                                                            <a href="#" class="d-block">
                                                                <img src="{{ URL::asset('build/images/small/img-12.jpg') }}"
                                                                    alt=""
                                                                    class="avatar-sm rounded object-fit-cover" />
                                                            </a>
                                                            <a href="#" class="d-block">
                                                                <img src="{{ URL::asset('build/images/small/img-11.jpg') }}"
                                                                    alt=""
                                                                    class="avatar-sm rounded object-fit-cover" />
                                                            </a>
                                                            <a href="#" class="d-block">
                                                                <img src="{{ URL::asset('build/images/small/img-10.jpg') }}"
                                                                    alt=""
                                                                    class="avatar-sm rounded object-fit-cover" />
                                                            </a>
                                                        </div>

                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Henry</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">12 Jul, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="badge rounded-pill bg-success mb-0">
                                                                    <i class="mdi mdi-star"></i> 4.0
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-0"> Great at this price,
                                                                        Product quality and look is awesome.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Nancy</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="badge rounded-pill bg-success mb-0">
                                                                    <i class="mdi mdi-star"></i> 4.2
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-0">Good product. I am so happy.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Joseph</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="badge rounded-pill bg-success mb-0">
                                                                    <i class="mdi mdi-star"></i> 4.1
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-0">Nice Product, Good Quality.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Jimmy</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">24 Jun, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end Ratings & Reviews -->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end card-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages//apps_nft_item_details.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
