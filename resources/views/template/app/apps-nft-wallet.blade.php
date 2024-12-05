@extends('layouts.master')
@section('title')
    @lang('translation.wallet-connect')
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

    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="text-center mb-4">
                <h4>Your current wallet</h4>
                <p class="text-muted fs-13">WalletConnect is a convenient open source tool that enables a mobile wallet to
                    easily connect to decentralized web applications, and interact with them from your phone.</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/metamask.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Metamask</h5>
                    <p class="text-muted pb-1">MetaMask is a software cryptocurrency wallet used to interact with the
                        Ethereum blockchain.</p>
                    <a href="#!" class="btn btn-danger">Change Wallet</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="text-center mb-4">
                <h4>Connect with one of our other available wallet providers.</h4>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/metamask.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Metamask</h5>
                    <p class="text-muted pb-1">MetaMask is a software cryptocurrency wallet used to interact with the
                        Ethereum blockchain.</p>
                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/coinbase.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Coinbase Wallet</h5>
                    <p class="text-muted pb-1">Coinbase Wallet is a software product that gives you access to a wide
                        spectrum.</p>
                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/kukai.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Kukai Wallet</h5>
                    <p class="text-muted pb-1">Kukai is a seamless browser-based wallet that allows users to store,
                        transfer, and delegate.</p>
                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/binance.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Binance</h5>
                    <p class="text-muted pb-1">Binance offers a relatively secure, versatile way to invest in and trade
                        cryptocurrencies.</p>
                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/enjin.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Enjin Wallet</h5>
                    <p class="text-muted pb-1">Enjin is a store of value that can be used in the non-fungible token (NFT)
                        marketplace.</p>
                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/alpha.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Alpha Wallet</h5>
                    <p class="text-muted pb-1">AlphaWallet uses the TokenScript framework, which makes tokens become
                        “smart”.</p>
                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-center">
                <div class="card-body py-5 px-4">
                    <img src="{{ URL::asset('build/images/nft/wallet/math.png') }}" alt="" height="55"
                        class="mb-3 pb-2">
                    <h5>Math Wallet</h5>
                    <p class="text-muted pb-1">Math DApp Factory gives users tools that can simplify the development of
                        exchanges, games</p>
                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
