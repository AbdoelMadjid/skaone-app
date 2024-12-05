@extends('layouts.master')
@section('title')
    @lang('translation.ranking')
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
            @lang('translation.nft-marketplace')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="contactList">
                <div class="card-header">
                    <div class="d-flex align-items center">
                        <h5 class="card-title mb-0 flex-grow-1">The top NFTs ranking on Velzon</h5>
                        <p class="text-muted mb-0">Updated: 28 April, 2022 08:05:00</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between g-3">
                        <div class="col-xxl-3 col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search for ...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false
                                    name="choices-single-default" id="idStatus">
                                    <option value="All Time" selected>All Time</option>
                                    <option value="1 Day">1 Day</option>
                                    <option value="7 Days">7 Days</option>
                                    <option value="15 Days">15 Days</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="6 Month">6 Month</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap table-hover" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="ranking" scope="col" style="width: 98px;">Ranking</th>
                                    <th class="sort" data-sort="collection" scope="col">Collection</th>
                                    <th class="sort" data-sort="volume_price" scope="col">Volume (USD)</th>
                                    <th class="sort" data-sort="24h" scope="col">24h%</th>
                                    <th class="sort" data-sort="7d" scope="col">7d%</th>
                                    <th class="sort" data-sort="item" scope="col">Item</th>
                                    <th class="sort" data-sort="floor-price" scope="col">Floor Price</th>
                                </tr>
                                <!--end tr-->
                            </thead>
                            <tbody class="list form-check-all">
                                <tr>
                                    <td class="ranking text-info fw-semibold">
                                        #1
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-01.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Abstract Face Painting</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">7,50,000</td>
                                    <td>
                                        <h6 class="text-success mb-1 24h">342.35 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-success mb-1 7d">312.35 ETH</h6>
                                    </td>
                                    <td class="item">10k</td>
                                    <td class="floor-price">33.02</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking text-info fw-semibold">
                                        #2
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Patterns Arts & Culture</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">32,850</td>
                                    <td>
                                        <h6 class="text-danger mb-1 24h">-42.03 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-success mb-1 7d">20.14 ETH</h6>
                                    </td>
                                    <td class="item">8k</td>
                                    <td class="floor-price">74.69</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking text-info fw-semibold">
                                        #3
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-02.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Creative Filtered
                                                Portrait</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">1,36,000</td>
                                    <td>
                                        <h6 class="text-success mb-1 24h">170.31 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-danger mb-1 7d">-415.21 ETH</h6>
                                    </td>
                                    <td class="item">15k</td>
                                    <td class="floor-price">67.16</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #4
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="https://img.themesbrand.com/velzon/images/img-2.gif" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Long-tailed Macaque</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">3,63,000</td>
                                    <td>
                                        <h6 class="text-success mb-1 24h">709.13 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-danger mb-1 7d">-645.10 ETH</h6>
                                    </td>
                                    <td class="item">21k</td>
                                    <td class="floor-price">137.09</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #5
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-04.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Robotic Body Art</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">25,800</td>
                                    <td>
                                        <h6 class="text-danger mb-1 24h">-347.42 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-danger mb-1 7d">-321.17 ETH</h6>
                                    </td>
                                    <td class="item">17k</td>
                                    <td class="floor-price">343.75</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #6
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Smillevers Crypto</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">37,100</td>
                                    <td>
                                        <h6 class="text-success mb-1 24h">1.42 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-success mb-1 7d">0.64 ETH</h6>
                                    </td>
                                    <td class="item">31k</td>
                                    <td class="floor-price">1.87</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #7
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="https://img.themesbrand.com/velzon/images/img-5.gif" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">The Chirstoper</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">1,87,600</td>
                                    <td>
                                        <h6 class="text-danger mb-1 24h">-31.49 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-success mb-1 7d">26.07 ETH</h6>
                                    </td>
                                    <td class="item">18k</td>
                                    <td class="floor-price">101.12</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #8
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Walking On Air</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">4,62,000</td>
                                    <td>
                                        <h6 class="text-success mb-1 24h">238.13 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-success mb-1 7d">183.40 ETH</h6>
                                    </td>
                                    <td class="item">8.3k</td>
                                    <td class="floor-price">143.39</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #9
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">The Chirstoper</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">74,950</td>
                                    <td>
                                        <h6 class="text-danger mb-1 24h">-31.49 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-danger mb-1 7d">-26.07 ETH</h6>
                                    </td>
                                    <td class="item">7.9k</td>
                                    <td class="floor-price">101.12</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #10
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Walking On Air</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">3,35,750</td>
                                    <td>
                                        <h6 class="text-success mb-1 24h">238.13 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-danger mb-1 7d">-64.30 ETH</h6>
                                    </td>
                                    <td class="item">8.3k</td>
                                    <td class="floor-price">143.39</td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="ranking">
                                        #11
                                    </td>
                                    <td class="collection">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-04.jpg') }}" alt=""
                                                class="avatar-xs rounded-circle object-fit-cover me-2"> <a
                                                href="/apps_nft_item_details" class="text-body">Highstreet IHO Part</a>
                                        </div>
                                    </td>
                                    <td class="volume_price">35,750</td>
                                    <td>
                                        <h6 class="text-success mb-1 24h">23.10 ETH</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-danger mb-1 7d">-64.36 ETH</h6>
                                    </td>
                                    <td class="item">12.3k</td>
                                    <td class="floor-price">367.39</td>
                                </tr>
                                <!--end tr-->
                            </tbody>
                        </table>
                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">>We've searched more than 150+ ranking We did not find any
                                    ranking for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <!-- list.js min js -->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/apps-nft-ranking.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
