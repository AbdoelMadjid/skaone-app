@extends('layouts.master')
@section('title')
    @lang('translation.crypto-svg')
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-1">Examples</h5>
                    <p class="text-muted mb-0">Use <code>&lt;img src="build/images/svg/crypto-icons/**.svg"&gt;</code> class.
                    </p>
                </div>
                <div class="card-body">
                    <div class="row icon-demo-content">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/$pac.svg') }}" alt=""
                                    class="avatar-xxs" /> $pac
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/0xbtc.svg') }}" alt=""
                                    class="avatar-xxs" /> 0xbtc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/2give.svg') }}" alt=""
                                    class="avatar-xxs" /> 2give
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/aave.svg') }}" alt=""
                                    class="avatar-xxs" /> aave
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/abt.svg') }}" alt=""
                                    class="avatar-xxs" /> abt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/act.svg') }}" alt=""
                                    class="avatar-xxs" /> act
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/actn.svg') }}" alt=""
                                    class="avatar-xxs" /> actn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ada.svg') }}" alt=""
                                    class="avatar-xxs" /> ada
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/add.svg') }}" alt=""
                                    class="avatar-xxs" /> add
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/adx.svg') }}" alt=""
                                    class="avatar-xxs" /> adx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ae.svg') }}" alt=""
                                    class="avatar-xxs" /> ae
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/aeon.svg') }}" alt=""
                                    class="avatar-xxs" /> aeon
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/aeur.svg') }}" alt=""
                                    class="avatar-xxs" /> aeur
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/agi.svg') }}" alt=""
                                    class="avatar-xxs" /> agi
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/agrs.svg') }}" alt=""
                                    class="avatar-xxs" /> agrs
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/aion.svg') }}" alt=""
                                    class="avatar-xxs" /> aion
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/algo.svg') }}" alt=""
                                    class="avatar-xxs" /> algo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/amb.svg') }}" alt=""
                                    class="avatar-xxs" /> amb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/amp.svg') }}" alt=""
                                    class="avatar-xxs" /> amp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ampl.svg') }}" alt=""
                                    class="avatar-xxs" /> ampl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ankr.svg') }}" alt=""
                                    class="avatar-xxs" /> ankr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ant.svg') }}" alt=""
                                    class="avatar-xxs" /> ant
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/apex.svg') }}" alt=""
                                    class="avatar-xxs" /> apex
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/appc.svg') }}" alt=""
                                    class="avatar-xxs" /> appc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ardr.svg') }}" alt=""
                                    class="avatar-xxs" /> ardr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/arg.svg') }}" alt=""
                                    class="avatar-xxs" /> arg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ark.svg') }}" alt=""
                                    class="avatar-xxs" /> ark
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/arn.svg') }}" alt=""
                                    class="avatar-xxs" /> arn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/arnx.svg') }}" alt=""
                                    class="avatar-xxs" /> arnx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ary.svg') }}" alt=""
                                    class="avatar-xxs" /> ary
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ast.svg') }}" alt=""
                                    class="avatar-xxs" /> ast
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/atm.svg') }}" alt=""
                                    class="avatar-xxs" /> atm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/atom.svg') }}" alt=""
                                    class="avatar-xxs" /> atom
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/audr.svg') }}" alt=""
                                    class="avatar-xxs" /> audr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/auto.svg') }}" alt=""
                                    class="avatar-xxs" /> auto
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/aywa.svg') }}" alt=""
                                    class="avatar-xxs" /> aywa
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bab.svg') }}" alt=""
                                    class="avatar-xxs" /> bab
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bal.svg') }}" alt=""
                                    class="avatar-xxs" /> bal
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/band.svg') }}" alt=""
                                    class="avatar-xxs" /> band
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bat.svg') }}" alt=""
                                    class="avatar-xxs" /> bat
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bay.svg') }}" alt=""
                                    class="avatar-xxs" /> bay
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bcbc.svg') }}" alt=""
                                    class="avatar-xxs" /> bcbc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bcc.svg') }}" alt=""
                                    class="avatar-xxs" /> bcc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bcd.svg') }}" alt=""
                                    class="avatar-xxs" /> bcd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bch.svg') }}" alt=""
                                    class="avatar-xxs" /> bch
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bcio.svg') }}" alt=""
                                    class="avatar-xxs" /> bcio
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bcn.svg') }}" alt=""
                                    class="avatar-xxs" /> bcn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bco.svg') }}" alt=""
                                    class="avatar-xxs" /> bco
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bcpt.svg') }}" alt=""
                                    class="avatar-xxs" /> bcpt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bdl.svg') }}" alt=""
                                    class="avatar-xxs" /> bdl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/beam.svg') }}" alt=""
                                    class="avatar-xxs" /> beam
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bela.svg') }}" alt=""
                                    class="avatar-xxs" /> bela
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bix.svg') }}" alt=""
                                    class="avatar-xxs" /> bix
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/blcn.svg') }}" alt=""
                                    class="avatar-xxs" /> blcn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/blk.svg') }}" alt=""
                                    class="avatar-xxs" /> blk
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/block.svg') }}" alt=""
                                    class="avatar-xxs" /> block
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/blz.svg') }}" alt=""
                                    class="avatar-xxs" /> blz
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bnb.svg') }}" alt=""
                                    class="avatar-xxs" /> bnb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bnt.svg') }}" alt=""
                                    class="avatar-xxs" /> bnt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bnty.svg') }}" alt=""
                                    class="avatar-xxs" /> bnty
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/booty.svg') }}" alt=""
                                    class="avatar-xxs" /> booty
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bos.svg') }}" alt=""
                                    class="avatar-xxs" /> bos
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bpt.svg') }}" alt=""
                                    class="avatar-xxs" /> bpt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bq.svg') }}" alt=""
                                    class="avatar-xxs" /> bq
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/brd.svg') }}" alt=""
                                    class="avatar-xxs" /> brd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bsd.svg') }}" alt=""
                                    class="avatar-xxs" /> bsd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bsv.svg') }}" alt=""
                                    class="avatar-xxs" /> bsv
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btc.svg') }}" alt=""
                                    class="avatar-xxs" /> btc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btcd.svg') }}" alt=""
                                    class="avatar-xxs" /> btcd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btch.svg') }}" alt=""
                                    class="avatar-xxs" /> btch
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btcp.svg') }}" alt=""
                                    class="avatar-xxs" /> btcp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btcz.svg') }}" alt=""
                                    class="avatar-xxs" /> btcz
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btdx.svg') }}" alt=""
                                    class="avatar-xxs" /> btdx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btg.svg') }}" alt=""
                                    class="avatar-xxs" /> btg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btm.svg') }}" alt=""
                                    class="avatar-xxs" /> btm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bts.svg') }}" alt=""
                                    class="avatar-xxs" /> bts
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btt.svg') }}" alt=""
                                    class="avatar-xxs" /> btt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btx.svg') }}" alt=""
                                    class="avatar-xxs" /> btx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/burst.svg') }}" alt=""
                                    class="avatar-xxs" /> burst
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bze.svg') }}" alt=""
                                    class="avatar-xxs" /> bze
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/call.svg') }}" alt=""
                                    class="avatar-xxs" /> call
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cc.svg') }}" alt=""
                                    class="avatar-xxs" /> cc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cdn.svg') }}" alt=""
                                    class="avatar-xxs" /> cdn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cdt.svg') }}" alt=""
                                    class="avatar-xxs" /> cdt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cenz.svg') }}" alt=""
                                    class="avatar-xxs" /> cenz
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/chain.svg') }}" alt=""
                                    class="avatar-xxs" /> chain
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/chat.svg') }}" alt=""
                                    class="avatar-xxs" /> chat
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/chips.svg') }}" alt=""
                                    class="avatar-xxs" /> chips
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/chsb.svg') }}" alt=""
                                    class="avatar-xxs" /> chsb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cix.svg') }}" alt=""
                                    class="avatar-xxs" /> cix
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/clam.svg') }}" alt=""
                                    class="avatar-xxs" /> clam
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cloak.svg') }}" alt=""
                                    class="avatar-xxs" /> cloak
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cmm.svg') }}" alt=""
                                    class="avatar-xxs" /> cmm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cmt.svg') }}" alt=""
                                    class="avatar-xxs" /> cmt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cnd.svg') }}" alt=""
                                    class="avatar-xxs" /> cnd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cnx.svg') }}" alt=""
                                    class="avatar-xxs" /> cnx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cny.svg') }}" alt=""
                                    class="avatar-xxs" /> cny
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cob.svg') }}" alt=""
                                    class="avatar-xxs" /> cob
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/colx.svg') }}" alt=""
                                    class="avatar-xxs" /> colx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/comp.svg') }}" alt=""
                                    class="avatar-xxs" /> comp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/coqui.svg') }}" alt=""
                                    class="avatar-xxs" /> coqui
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cred.svg') }}" alt=""
                                    class="avatar-xxs" /> cred
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/crpt.svg') }}" alt=""
                                    class="avatar-xxs" /> crpt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/crv.svg') }}" alt=""
                                    class="avatar-xxs" /> crv
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/crw.svg') }}" alt=""
                                    class="avatar-xxs" /> crw
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cs.svg') }}" alt=""
                                    class="avatar-xxs" /> cs
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ctr.svg') }}" alt=""
                                    class="avatar-xxs" /> ctr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ctxc.svg') }}" alt=""
                                    class="avatar-xxs" /> ctxc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cvc.svg') }}" alt=""
                                    class="avatar-xxs" /> cvc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/d.svg') }}" alt=""
                                    class="avatar-xxs" /> d
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dai.svg') }}" alt=""
                                    class="avatar-xxs" /> dai
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dash.svg') }}" alt=""
                                    class="avatar-xxs" /> dash
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dat.svg') }}" alt=""
                                    class="avatar-xxs" /> dat
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/data.svg') }}" alt=""
                                    class="avatar-xxs" /> data
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dbc.svg') }}" alt=""
                                    class="avatar-xxs" /> dbc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dcn.svg') }}" alt=""
                                    class="avatar-xxs" /> dcn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dcr.svg') }}" alt=""
                                    class="avatar-xxs" /> dcr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/deez.svg') }}" alt=""
                                    class="avatar-xxs" /> deez
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dent.svg') }}" alt=""
                                    class="avatar-xxs" /> dent
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dew.svg') }}" alt=""
                                    class="avatar-xxs" /> dew
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dgb.svg') }}" alt=""
                                    class="avatar-xxs" /> dgb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dgd.svg') }}" alt=""
                                    class="avatar-xxs" /> dgd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dlt.svg') }}" alt=""
                                    class="avatar-xxs" /> dlt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dnt.svg') }}" alt=""
                                    class="avatar-xxs" /> dnt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dock.svg') }}" alt=""
                                    class="avatar-xxs" /> dock
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/doge.svg') }}" alt=""
                                    class="avatar-xxs" /> doge
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dot.svg') }}" alt=""
                                    class="avatar-xxs" /> dot
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/drgn.svg') }}" alt=""
                                    class="avatar-xxs" /> drgn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/drop.svg') }}" alt=""
                                    class="avatar-xxs" /> drop
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dta.svg') }}" alt=""
                                    class="avatar-xxs" /> dta
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dth.svg') }}" alt=""
                                    class="avatar-xxs" /> dth
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dtr.svg') }}" alt=""
                                    class="avatar-xxs" /> dtr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ebst.svg') }}" alt=""
                                    class="avatar-xxs" /> ebst
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eca.svg') }}" alt=""
                                    class="avatar-xxs" /> eca
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/edg.svg') }}" alt=""
                                    class="avatar-xxs" /> edg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/edo.svg') }}" alt=""
                                    class="avatar-xxs" /> edo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/edoge.svg') }}" alt=""
                                    class="avatar-xxs" /> edoge
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ela.svg') }}" alt=""
                                    class="avatar-xxs" /> ela
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/elec.svg') }}" alt=""
                                    class="avatar-xxs" /> elec
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/elf.svg') }}" alt=""
                                    class="avatar-xxs" /> elf
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/elix.svg') }}" alt=""
                                    class="avatar-xxs" /> elix
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ella.svg') }}" alt=""
                                    class="avatar-xxs" /> ella
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/emb.svg') }}" alt=""
                                    class="avatar-xxs" /> emb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/emc.svg') }}" alt=""
                                    class="avatar-xxs" /> emc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/emc2.svg') }}" alt=""
                                    class="avatar-xxs" /> emc2
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eng.svg') }}" alt=""
                                    class="avatar-xxs" /> eng
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/enj.svg') }}" alt=""
                                    class="avatar-xxs" /> enj
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/entrp.svg') }}" alt=""
                                    class="avatar-xxs" /> entrp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eon.svg') }}" alt=""
                                    class="avatar-xxs" /> eon
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eop.svg') }}" alt=""
                                    class="avatar-xxs" /> eop
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eos.svg') }}" alt=""
                                    class="avatar-xxs" /> eos
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eqli.svg') }}" alt=""
                                    class="avatar-xxs" /> eqli
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/equa.svg') }}" alt=""
                                    class="avatar-xxs" /> equa
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/etc.svg') }}" alt=""
                                    class="avatar-xxs" /> etc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eth.svg') }}" alt=""
                                    class="avatar-xxs" /> eth
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ethos.svg') }}" alt=""
                                    class="avatar-xxs" /> ethos
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/etn.svg') }}" alt=""
                                    class="avatar-xxs" /> etn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/etp.svg') }}" alt=""
                                    class="avatar-xxs" /> etp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eur.svg') }}" alt=""
                                    class="avatar-xxs" /> eur
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/evx.svg') }}" alt=""
                                    class="avatar-xxs" /> evx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/exmo.svg') }}" alt=""
                                    class="avatar-xxs" /> exmo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/exp.svg') }}" alt=""
                                    class="avatar-xxs" /> exp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fair.svg') }}" alt=""
                                    class="avatar-xxs" /> fair
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fct.svg') }}" alt=""
                                    class="avatar-xxs" /> fct
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fil.svg') }}" alt=""
                                    class="avatar-xxs" /> fil
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fjc.svg') }}" alt=""
                                    class="avatar-xxs" /> fjc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fldc.svg') }}" alt=""
                                    class="avatar-xxs" /> fldc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/flo.svg') }}" alt=""
                                    class="avatar-xxs" /> flo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/flux.svg') }}" alt=""
                                    class="avatar-xxs" /> flux
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fsn.svg') }}" alt=""
                                    class="avatar-xxs" /> fsn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ftc.svg') }}" alt=""
                                    class="avatar-xxs" /> ftc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fuel.svg') }}" alt=""
                                    class="avatar-xxs" /> fuel
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/fun.svg') }}" alt=""
                                    class="avatar-xxs" /> fun
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/game.svg') }}" alt=""
                                    class="avatar-xxs" /> game
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gas.svg') }}" alt=""
                                    class="avatar-xxs" /> gas
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gbp.svg') }}" alt=""
                                    class="avatar-xxs" /> gbp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gbx.svg') }}" alt=""
                                    class="avatar-xxs" /> gbx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gbyte.svg') }}" alt=""
                                    class="avatar-xxs" /> gbyte
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/generic.svg') }}" alt=""
                                    class="avatar-xxs" /> generic
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gin.svg') }}" alt=""
                                    class="avatar-xxs" /> gin
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/glxt.svg') }}" alt=""
                                    class="avatar-xxs" /> glxt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gmr.svg') }}" alt=""
                                    class="avatar-xxs" /> gmr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gno.svg') }}" alt=""
                                    class="avatar-xxs" /> gno
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gnt.svg') }}" alt=""
                                    class="avatar-xxs" /> gnt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gold.svg') }}" alt=""
                                    class="avatar-xxs" /> gold
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/grc.svg') }}" alt=""
                                    class="avatar-xxs" /> grc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/grin.svg') }}" alt=""
                                    class="avatar-xxs" /> grin
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/grs.svg') }}" alt=""
                                    class="avatar-xxs" /> grs
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/grt.svg') }}" alt=""
                                    class="avatar-xxs" /> grt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gsc.svg') }}" alt=""
                                    class="avatar-xxs" /> gsc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gto.svg') }}" alt=""
                                    class="avatar-xxs" /> gto
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gup.svg') }}" alt=""
                                    class="avatar-xxs" /> gup
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gusd.svg') }}" alt=""
                                    class="avatar-xxs" /> gusd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gvt.svg') }}" alt=""
                                    class="avatar-xxs" /> gvt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gxs.svg') }}" alt=""
                                    class="avatar-xxs" /> gxs
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/gzr.svg') }}" alt=""
                                    class="avatar-xxs" /> gzr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/hight.svg') }}" alt=""
                                    class="avatar-xxs" /> hight
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/hns.svg') }}" alt=""
                                    class="avatar-xxs" /> hns
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/hodl.svg') }}" alt=""
                                    class="avatar-xxs" /> hodl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/hot.svg') }}" alt=""
                                    class="avatar-xxs" /> hot
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/hpb.svg') }}" alt=""
                                    class="avatar-xxs" /> hpb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/hsr.svg') }}" alt=""
                                    class="avatar-xxs" /> hsr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ht.svg') }}" alt=""
                                    class="avatar-xxs" /> ht
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/html.svg') }}" alt=""
                                    class="avatar-xxs" /> html
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/huc.svg') }}" alt=""
                                    class="avatar-xxs" /> huc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/husd.svg') }}" alt=""
                                    class="avatar-xxs" /> husd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/hush.svg') }}" alt=""
                                    class="avatar-xxs" /> hush
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/icn.svg') }}" alt=""
                                    class="avatar-xxs" /> icn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/icp.svg') }}" alt=""
                                    class="avatar-xxs" /> icp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/icx.svg') }}" alt=""
                                    class="avatar-xxs" /> icx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ignis.svg') }}" alt=""
                                    class="avatar-xxs" /> ignis
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ilk.svg') }}" alt=""
                                    class="avatar-xxs" /> ilk
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ink.svg') }}" alt=""
                                    class="avatar-xxs" /> ink
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ins.svg') }}" alt=""
                                    class="avatar-xxs" /> ins
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ion.svg') }}" alt=""
                                    class="avatar-xxs" /> ion
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/iop.svg') }}" alt=""
                                    class="avatar-xxs" /> iop
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/iop.svg') }}" alt=""
                                    class="avatar-xxs" /> iop
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/iost.svg') }}" alt=""
                                    class="avatar-xxs" /> iost
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/iotx.svg') }}" alt=""
                                    class="avatar-xxs" /> iotx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/iq.svg') }}" alt=""
                                    class="avatar-xxs" /> iq
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/itc.svg') }}" alt=""
                                    class="avatar-xxs" /> itc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/jnt.svg') }}" alt=""
                                    class="avatar-xxs" /> jnt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/jpy.svg') }}" alt=""
                                    class="avatar-xxs" /> jpy
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/kcs.svg') }}" alt=""
                                    class="avatar-xxs" /> kcs
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/kin.svg') }}" alt=""
                                    class="avatar-xxs" /> kin
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/klown.svg') }}" alt=""
                                    class="avatar-xxs" /> klown
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/kmd.svg') }}" alt=""
                                    class="avatar-xxs" /> kmd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/knc.svg') }}" alt=""
                                    class="avatar-xxs" /> knc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/krb.svg') }}" alt=""
                                    class="avatar-xxs" /> krb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ksm.svg') }}" alt=""
                                    class="avatar-xxs" /> ksm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/lbc.svg') }}" alt=""
                                    class="avatar-xxs" /> lbc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/lend.svg') }}" alt=""
                                    class="avatar-xxs" /> lend
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/leo.svg') }}" alt=""
                                    class="avatar-xxs" /> leo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/link.svg') }}" alt=""
                                    class="avatar-xxs" /> link
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/lkk.svg') }}" alt=""
                                    class="avatar-xxs" /> lkk
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/loom.svg') }}" alt=""
                                    class="avatar-xxs" /> loom
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/lpt.svg') }}" alt=""
                                    class="avatar-xxs" /> lpt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/lrc.svg') }}" alt=""
                                    class="avatar-xxs" /> lrc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/lsk.svg') }}" alt=""
                                    class="avatar-xxs" /> lsk
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ltc.svg') }}" alt=""
                                    class="avatar-xxs" /> ltc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/lun.svg') }}" alt=""
                                    class="avatar-xxs" /> lun
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/maid.svg') }}" alt=""
                                    class="avatar-xxs" /> maid
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mana.svg') }}" alt=""
                                    class="avatar-xxs" /> mana
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/matic.svg') }}" alt=""
                                    class="avatar-xxs" /> matic
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/max.svg') }}" alt=""
                                    class="avatar-xxs" /> max
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mcap.svg') }}" alt=""
                                    class="avatar-xxs" /> mcap
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mco.svg') }}" alt=""
                                    class="avatar-xxs" /> mco
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mda.svg') }}" alt=""
                                    class="avatar-xxs" /> mda
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mds.svg') }}" alt=""
                                    class="avatar-xxs" /> mds
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/med.svg') }}" alt=""
                                    class="avatar-xxs" /> med
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/meetone.svg') }}"
                                    alt="" class="avatar-xxs" /> meetone
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mft.svg') }}" alt=""
                                    class="avatar-xxs" /> mft
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/miota.svg') }}" alt=""
                                    class="avatar-xxs" /> miota
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mith.svg') }}" alt=""
                                    class="avatar-xxs" /> mith
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mkr.svg') }}" alt=""
                                    class="avatar-xxs" /> mkr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mln.svg') }}" alt=""
                                    class="avatar-xxs" /> mln
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mnx.svg') }}" alt=""
                                    class="avatar-xxs" /> mnx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mnz.svg') }}" alt=""
                                    class="avatar-xxs" /> mnz
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/moac.svg') }}" alt=""
                                    class="avatar-xxs" /> moac
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mod.svg') }}" alt=""
                                    class="avatar-xxs" /> mod
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mona.svg') }}" alt=""
                                    class="avatar-xxs" /> mona
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/msr.svg') }}" alt=""
                                    class="avatar-xxs" /> msr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mth.svg') }}" alt=""
                                    class="avatar-xxs" /> mth
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mtl.svg') }}" alt=""
                                    class="avatar-xxs" /> mtl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/music.svg') }}" alt=""
                                    class="avatar-xxs" /> music
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mzc.svg') }}" alt=""
                                    class="avatar-xxs" /> mzc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nano.svg') }}" alt=""
                                    class="avatar-xxs" /> nano
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nas.svg') }}" alt=""
                                    class="avatar-xxs" /> nas
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nav.svg') }}" alt=""
                                    class="avatar-xxs" /> nav
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ncash.svg') }}" alt=""
                                    class="avatar-xxs" /> ncash
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ndz.svg') }}" alt=""
                                    class="avatar-xxs" /> ndz
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nebl.svg') }}" alt=""
                                    class="avatar-xxs" /> nebl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/neo.svg') }}" alt=""
                                    class="avatar-xxs" /> neo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/neos.svg') }}" alt=""
                                    class="avatar-xxs" /> neos
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/neu.svg') }}" alt=""
                                    class="avatar-xxs" /> neu
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nexo.svg') }}" alt=""
                                    class="avatar-xxs" /> nexo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ngc.svg') }}" alt=""
                                    class="avatar-xxs" /> ngc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nio.svg') }}" alt=""
                                    class="avatar-xxs" /> nio
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nkn.svg') }}" alt=""
                                    class="avatar-xxs" /> nkn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nlc2.svg') }}" alt=""
                                    class="avatar-xxs" /> nlc2
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nlg.svg') }}" alt=""
                                    class="avatar-xxs" /> nlg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nmc.svg') }}" alt=""
                                    class="avatar-xxs" /> nmc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nmr.svg') }}" alt=""
                                    class="avatar-xxs" /> nmr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/npxs.svg') }}" alt=""
                                    class="avatar-xxs" /> npxs
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ntbc.svg') }}" alt=""
                                    class="avatar-xxs" /> ntbc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nuls.svg') }}" alt=""
                                    class="avatar-xxs" /> nuls
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nxs.svg') }}" alt=""
                                    class="avatar-xxs" /> nxs
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/nxt.svg') }}" alt=""
                                    class="avatar-xxs" /> nxt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/oax.svg') }}" alt=""
                                    class="avatar-xxs" /> oax
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ok.svg') }}" alt=""
                                    class="avatar-xxs" /> ok
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/omg.svg') }}" alt=""
                                    class="avatar-xxs" /> omg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/omni.svg') }}" alt=""
                                    class="avatar-xxs" /> omni
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/one.svg') }}" alt=""
                                    class="avatar-xxs" /> one
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ong.svg') }}" alt=""
                                    class="avatar-xxs" /> ong
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ont.svg') }}" alt=""
                                    class="avatar-xxs" /> ont
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/oot.svg') }}" alt=""
                                    class="avatar-xxs" /> oot
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ost.svg') }}" alt=""
                                    class="avatar-xxs" /> ost
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ox.svg') }}" alt=""
                                    class="avatar-xxs" /> ox
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/oxt.svg') }}" alt=""
                                    class="avatar-xxs" /> oxt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/part.svg') }}" alt=""
                                    class="avatar-xxs" /> part
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pasc.svg') }}" alt=""
                                    class="avatar-xxs" /> pasc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pasl.svg') }}" alt=""
                                    class="avatar-xxs" /> pasl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pax.svg') }}" alt=""
                                    class="avatar-xxs" /> pax
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/paxg.svg') }}" alt=""
                                    class="avatar-xxs" /> paxg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pay.svg') }}" alt=""
                                    class="avatar-xxs" /> pay
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/payx.svg') }}" alt=""
                                    class="avatar-xxs" /> payx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pink.svg') }}" alt=""
                                    class="avatar-xxs" /> pink
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pirl.svg') }}" alt=""
                                    class="avatar-xxs" /> pirl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pivx.svg') }}" alt=""
                                    class="avatar-xxs" /> pivx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/plr.svg') }}" alt=""
                                    class="avatar-xxs" /> plr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/poa.svg') }}" alt=""
                                    class="avatar-xxs" /> poa
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/poe.svg') }}" alt=""
                                    class="avatar-xxs" /> poe
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/polis.svg') }}" alt=""
                                    class="avatar-xxs" /> polis
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/poly.svg') }}" alt=""
                                    class="avatar-xxs" /> poly
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pot.svg') }}" alt=""
                                    class="avatar-xxs" /> pot
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/powr.svg') }}" alt=""
                                    class="avatar-xxs" /> powr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ppc.svg') }}" alt=""
                                    class="avatar-xxs" /> ppc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ppp.svg') }}" alt=""
                                    class="avatar-xxs" /> ppp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ppt.svg') }}" alt=""
                                    class="avatar-xxs" /> ppt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pre.svg') }}" alt=""
                                    class="avatar-xxs" /> pre
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/prl.svg') }}" alt=""
                                    class="avatar-xxs" /> prl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pungo.svg') }}" alt=""
                                    class="avatar-xxs" /> pungo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/pura.svg') }}" alt=""
                                    class="avatar-xxs" /> pura
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/qash.svg') }}" alt=""
                                    class="avatar-xxs" /> qash
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/qiwi.svg') }}" alt=""
                                    class="avatar-xxs" /> qiwi
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/qlc.svg') }}" alt=""
                                    class="avatar-xxs" /> qlc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/qrl.svg') }}" alt=""
                                    class="avatar-xxs" /> qrl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/qsp.svg') }}" alt=""
                                    class="avatar-xxs" /> qsp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/qtum.svg') }}" alt=""
                                    class="avatar-xxs" /> qtum
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/r.svg') }}" alt=""
                                    class="avatar-xxs" /> r
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rads.svg') }}" alt=""
                                    class="avatar-xxs" /> rads
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rap.svg') }}" alt=""
                                    class="avatar-xxs" /> rap
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rcn.svg') }}" alt=""
                                    class="avatar-xxs" /> rcn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rdd.svg') }}" alt=""
                                    class="avatar-xxs" /> rdd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rdn.svg') }}" alt=""
                                    class="avatar-xxs" /> rdn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ren.svg') }}" alt=""
                                    class="avatar-xxs" /> ren
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rep.svg') }}" alt=""
                                    class="avatar-xxs" /> rep
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/repv2.svg') }}" alt=""
                                    class="avatar-xxs" /> repv2
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/req.svg') }}" alt=""
                                    class="avatar-xxs" /> req
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rhoc.svg') }}" alt=""
                                    class="avatar-xxs" /> rhoc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ric.svg') }}" alt=""
                                    class="avatar-xxs" /> ric
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rise.svg') }}" alt=""
                                    class="avatar-xxs" /> rise
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rlc.svg') }}" alt=""
                                    class="avatar-xxs" /> rlc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rpx.svg') }}" alt=""
                                    class="avatar-xxs" /> rpx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rub.svg') }}" alt=""
                                    class="avatar-xxs" /> rub
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rvn.svg') }}" alt=""
                                    class="avatar-xxs" /> rvn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ryo.svg') }}" alt=""
                                    class="avatar-xxs" /> ryo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/safe.svg') }}" alt=""
                                    class="avatar-xxs" /> safe
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/safemoon.svg') }}"
                                    alt="" class="avatar-xxs" /> safemoon
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sai.svg') }}" alt=""
                                    class="avatar-xxs" /> sai
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/salt.svg') }}" alt=""
                                    class="avatar-xxs" /> salt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/san.svg') }}" alt=""
                                    class="avatar-xxs" /> san
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sand.svg') }}" alt=""
                                    class="avatar-xxs" /> sand
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sbd.svg') }}" alt=""
                                    class="avatar-xxs" /> sbd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sberbank.svg') }}"
                                    alt="" class="avatar-xxs" /> sberbank
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sc.svg') }}" alt=""
                                    class="avatar-xxs" /> sc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/shift.svg') }}" alt=""
                                    class="avatar-xxs" /> shift
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sib.svg') }}" alt=""
                                    class="avatar-xxs" /> sib
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sin.svg') }}" alt=""
                                    class="avatar-xxs" /> sin
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/skl.svg') }}" alt=""
                                    class="avatar-xxs" /> skl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sky.svg') }}" alt=""
                                    class="avatar-xxs" /> sky
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/slr.svg') }}" alt=""
                                    class="avatar-xxs" /> slr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sls.svg') }}" alt=""
                                    class="avatar-xxs" /> sls
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/smart.svg') }}" alt=""
                                    class="avatar-xxs" /> smart
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sngls.svg') }}" alt=""
                                    class="avatar-xxs" /> sngls
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/snm.svg') }}" alt=""
                                    class="avatar-xxs" /> snm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/snt.svg') }}" alt=""
                                    class="avatar-xxs" /> snt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/snx.svg') }}" alt=""
                                    class="avatar-xxs" /> snx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/soc.svg') }}" alt=""
                                    class="avatar-xxs" /> soc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sol.svg') }}" alt=""
                                    class="avatar-xxs" /> sol
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/spacehbit.svg') }}"
                                    alt="" class="avatar-xxs" /> spacehbit
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/spank.svg') }}" alt=""
                                    class="avatar-xxs" /> spank
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sphtx.svg') }}" alt=""
                                    class="avatar-xxs" /> sphtx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/srn.svg') }}" alt=""
                                    class="avatar-xxs" /> srn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/stak.svg') }}" alt=""
                                    class="avatar-xxs" /> stak
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/start.svg') }}" alt=""
                                    class="avatar-xxs" /> start
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/steem.svg') }}" alt=""
                                    class="avatar-xxs" /> steem
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/storj.svg') }}" alt=""
                                    class="avatar-xxs" /> storj
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/storm.svg') }}" alt=""
                                    class="avatar-xxs" /> storm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/stox.svg') }}" alt=""
                                    class="avatar-xxs" /> stox
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/stq.svg') }}" alt=""
                                    class="avatar-xxs" /> stq
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/strat.svg') }}" alt=""
                                    class="avatar-xxs" /> strat
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/stx.svg') }}" alt=""
                                    class="avatar-xxs" /> stx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sub.svg') }}" alt=""
                                    class="avatar-xxs" /> sub
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sumo.svg') }}" alt=""
                                    class="avatar-xxs" /> sumo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sushi.svg') }}" alt=""
                                    class="avatar-xxs" /> sushi
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/sys.svg') }}" alt=""
                                    class="avatar-xxs" /> sys
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/taas.svg') }}" alt=""
                                    class="avatar-xxs" /> taas
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tau.svg') }}" alt=""
                                    class="avatar-xxs" /> tau
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tbx.svg') }}" alt=""
                                    class="avatar-xxs" /> tbx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tel.svg') }}" alt=""
                                    class="avatar-xxs" /> tel
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ten.svg') }}" alt=""
                                    class="avatar-xxs" /> ten
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tern.svg') }}" alt=""
                                    class="avatar-xxs" /> tern
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tgch.svg') }}" alt=""
                                    class="avatar-xxs" /> tgch
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/theta.svg') }}" alt=""
                                    class="avatar-xxs" /> theta
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tix.svg') }}" alt=""
                                    class="avatar-xxs" /> tix
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tkn.svg') }}" alt=""
                                    class="avatar-xxs" /> tkn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tks.svg') }}" alt=""
                                    class="avatar-xxs" /> tks
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tnb.svg') }}" alt=""
                                    class="avatar-xxs" /> tnb
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tnc.svg') }}" alt=""
                                    class="avatar-xxs" /> tnc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tnt.svg') }}" alt=""
                                    class="avatar-xxs" /> tnt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tomo.svg') }}" alt=""
                                    class="avatar-xxs" /> tomo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tpay.svg') }}" alt=""
                                    class="avatar-xxs" /> tpay
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/trig.svg') }}" alt=""
                                    class="avatar-xxs" /> trig
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/trtl.svg') }}" alt=""
                                    class="avatar-xxs" /> trtl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/trx.svg') }}" alt=""
                                    class="avatar-xxs" /> trx
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tusd.svg') }}" alt=""
                                    class="avatar-xxs" /> tusd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/tzc.svg') }}" alt=""
                                    class="avatar-xxs" /> tzc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ubq.svg') }}" alt=""
                                    class="avatar-xxs" /> ubq
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/uma.svg') }}" alt=""
                                    class="avatar-xxs" /> uma
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/uni.svg') }}" alt=""
                                    class="avatar-xxs" /> uni
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/unity.svg') }}" alt=""
                                    class="avatar-xxs" /> unity
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/usd.svg') }}" alt=""
                                    class="avatar-xxs" /> usd
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/usdc.svg') }}" alt=""
                                    class="avatar-xxs" /> usdc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/usdt.svg') }}" alt=""
                                    class="avatar-xxs" /> usdt
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/utk.svg') }}" alt=""
                                    class="avatar-xxs" /> utk
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/veri.svg') }}" alt=""
                                    class="avatar-xxs" /> veri
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vet.svg') }}" alt=""
                                    class="avatar-xxs" /> vet
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/via.svg') }}" alt=""
                                    class="avatar-xxs" /> via
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vib.svg') }}" alt=""
                                    class="avatar-xxs" /> vib
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vibe.svg') }}" alt=""
                                    class="avatar-xxs" /> vibe
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vivo.svg') }}" alt=""
                                    class="avatar-xxs" /> vivo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vrc.svg') }}" alt=""
                                    class="avatar-xxs" /> vrc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vrsc.svg') }}" alt=""
                                    class="avatar-xxs" /> vrsc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vtc.svg') }}" alt=""
                                    class="avatar-xxs" /> vtc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vtho.svg') }}" alt=""
                                    class="avatar-xxs" /> vtho
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wabi.svg') }}" alt=""
                                    class="avatar-xxs" /> wabi
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wan.svg') }}" alt=""
                                    class="avatar-xxs" /> wan
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/waves.svg') }}" alt=""
                                    class="avatar-xxs" /> waves
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wax.svg') }}" alt=""
                                    class="avatar-xxs" /> wax
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wbtc.svg') }}" alt=""
                                    class="avatar-xxs" /> wbtc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wgr.svg') }}" alt=""
                                    class="avatar-xxs" /> wgr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wicc.svg') }}" alt=""
                                    class="avatar-xxs" /> wicc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wings.svg') }}" alt=""
                                    class="avatar-xxs" /> wings
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wpr.svg') }}" alt=""
                                    class="avatar-xxs" /> wpr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/wtc.svg') }}" alt=""
                                    class="avatar-xxs" /> wtc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/x.svg') }}" alt=""
                                    class="avatar-xxs" /> x
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xas.svg') }}" alt=""
                                    class="avatar-xxs" /> xas
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xbc.svg') }}" alt=""
                                    class="avatar-xxs" /> xbc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xbp.svg') }}" alt=""
                                    class="avatar-xxs" /> xbp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xby.svg') }}" alt=""
                                    class="avatar-xxs" /> xby
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xcp.svg') }}" alt=""
                                    class="avatar-xxs" /> xcp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xdn.svg') }}" alt=""
                                    class="avatar-xxs" /> xdn
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xem.svg') }}" alt=""
                                    class="avatar-xxs" /> xem
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xin.svg') }}" alt=""
                                    class="avatar-xxs" /> xin
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xlm.svg') }}" alt=""
                                    class="avatar-xxs" /> xlm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xmcc.svg') }}" alt=""
                                    class="avatar-xxs" /> xmcc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xmg.svg') }}" alt=""
                                    class="avatar-xxs" /> xmg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xmo.svg') }}" alt=""
                                    class="avatar-xxs" /> xmo
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xmr.svg') }}" alt=""
                                    class="avatar-xxs" /> xmr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xmy.svg') }}" alt=""
                                    class="avatar-xxs" /> xmy
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xp.svg') }}" alt=""
                                    class="avatar-xxs" /> xp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xpa.svg') }}" alt=""
                                    class="avatar-xxs" /> xpa
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xpm.svg') }}" alt=""
                                    class="avatar-xxs" /> xpm
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xpr.svg') }}" alt=""
                                    class="avatar-xxs" /> xpr
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xrp.svg') }}" alt=""
                                    class="avatar-xxs" /> xrp
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xsg.svg') }}" alt=""
                                    class="avatar-xxs" /> xsg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xtz.svg') }}" alt=""
                                    class="avatar-xxs" /> xtz
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xuc.svg') }}" alt=""
                                    class="avatar-xxs" /> xuc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xvc.svg') }}" alt=""
                                    class="avatar-xxs" /> xvc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xvg.svg') }}" alt=""
                                    class="avatar-xxs" /> xvg
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xzc.svg') }}" alt=""
                                    class="avatar-xxs" /> xzc
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/yfi.svg') }}" alt=""
                                    class="avatar-xxs" /> yfi
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/yoyow.svg') }}" alt=""
                                    class="avatar-xxs" /> yoyow
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zcl.svg') }}" alt=""
                                    class="avatar-xxs" /> zcl
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zec.svg') }}" alt=""
                                    class="avatar-xxs" /> zec
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zel.svg') }}" alt=""
                                    class="avatar-xxs" /> zel
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zen.svg') }}" alt=""
                                    class="avatar-xxs" /> zen
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zest.svg') }}" alt=""
                                    class="avatar-xxs" /> zest
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zil.svg') }}" alt=""
                                    class="avatar-xxs" /> zil
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zilla.svg') }}" alt=""
                                    class="avatar-xxs" /> zilla
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-muted hstack gap-2">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/zrx.svg') }}" alt=""
                                    class="avatar-xxs" /> zrx
                            </div>
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
