<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_analytics()
    {
        return view('template.dashboard.dashboard-analytics');
    }
    public function dashboard_crm()
    {
        return view('template.dashboard.dashboard-crm');
    }
    public function dashboard_crypto()
    {
        return view('template.dashboard.dashboard-crypto');
    }
    public function dashboard_ecommerce()
    {
        return view('template.dashboard.dashboard-ecommerce');
    }
    public function dashboard_job()
    {
        return view('template.dashboard.dashboard-job');
    }
    public function dashboard_projects()
    {
        return view('template.dashboard.dashboard-projects');
    }
    public function dashboard_nft()
    {
        return view('template.dashboard.dashboard-nft');
    }
}
