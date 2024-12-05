<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    public function layouts_detached()
    {
        return view('template.layout.layouts-detached');
    }
    public function layouts_horizontal()
    {
        return view('template.layout.layouts-horizontal');
    }
    public function layouts_vertical_hovered()
    {
        return view('template.layout.layouts-vertical-hovered');
    }
    public function layouts_two_column()
    {
        return view('template.layout.layouts-two-column');
    }
}
