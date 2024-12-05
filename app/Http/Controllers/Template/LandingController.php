<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing_job()
    {
        return view('template.landing.landing-job');
    }
    public function landing_basic()
    {
        return view('template.landing.landing-basic');
    }
    public function landing_nft()
    {
        return view('template.landing.landing-nft');
    }
}
