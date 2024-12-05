<?php

namespace App\Http\Controllers\AppSupport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EksporDataMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.appsupport.ekspor-data-master');
    }
}
