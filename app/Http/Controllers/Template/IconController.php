<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IconController extends Controller
{
    public function icons_boxicons()
    {
        return view('template.icon.icons-boxicons');
    }
    public function icons_crypto()
    {
        return view('template.icon.icons-crypto');
    }
    public function icons_feather()
    {
        return view('template.icon.icons-feather');
    }
    public function icons_lineawesome()
    {
        return view('template.icon.icons-lineawesome');
    }
    public function icons_materialdesign()
    {
        return view('template.icon.icons-materialdesign');
    }
    public function icons_remix()
    {
        return view('template.icon.icons-remix');
    }
}
