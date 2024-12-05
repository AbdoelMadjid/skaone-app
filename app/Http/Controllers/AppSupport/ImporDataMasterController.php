<?php

namespace App\Http\Controllers\AppSupport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImporDataMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.appsupport.impor-data-master');
    }
}
