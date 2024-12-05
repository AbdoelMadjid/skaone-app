<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function maps_google()
    {
        return view('template.map.maps-google');
    }
    public function maps_leaflet()
    {
        return view('template.map.maps-leaflet');
    }
    public function maps_vector()
    {
        return view('template.map.maps-vector');
    }
}
