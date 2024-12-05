<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function widgets()
    {
        return view('template.widgets');
    }
    public function pages_coming_soon()
    {
        return view('template.page.pages-coming-soon');
    }
    public function pages_faqs()
    {
        return view('template.page.pages-faqs');
    }
    public function pages_gallery()
    {
        return view('template.page.pages-gallery');
    }
    public function pages_maintenance()
    {
        return view('template.page.pages-maintenance');
    }
    public function pages_pricing()
    {
        return view('template.page.pages-pricing');
    }
    public function pages_privacy_policy()
    {
        return view('template.page.pages-privacy-policy');
    }
    public function pages_profile_basic()
    {
        return view('template.page.pages-profile-basic');
    }
    public function pages_profile_settings()
    {
        return view('template.page.pages-profile-settings');
    }
    public function pages_search_results()
    {
        return view('template.page.pages-search-results');
    }
    public function pages_sitemap()
    {
        return view('template.page.pages-sitemap');
    }
    public function pages_starter()
    {
        return view('template.page.pages-starter');
    }
    public function pages_team()
    {
        return view('template.page.pages-team');
    }
    public function pages_term_conditions()
    {
        return view('template.page.pages-term-conditions');
    }
    public function pages_timeline()
    {
        return view('template.page.pages-timeline');
    }
}
