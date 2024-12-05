<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvanceUiController extends Controller
{
    public function advance_ui_animation()
    {
        return view('template.advance-ui.advance-ui-animation');
    }
    public function advance_ui_highlight()
    {
        return view('template.advance-ui.advance-ui-highlight');
    }
    public function advance_ui_nestable()
    {
        return view('template.advance-ui.advance-ui-nestable');
    }
    public function advance_ui_ratings()
    {
        return view('template.advance-ui.advance-ui-ratings');
    }
    public function advance_ui_scrollbar()
    {
        return view('template.advance-ui.advance-ui-scrollbar');
    }
    public function advance_ui_scrollspy()
    {
        return view('template.advance-ui.advance-ui-scrollspy');
    }
    public function advance_ui_sweetalerts()
    {
        return view('template.advance-ui.advance-ui-sweetalerts');
    }
    public function advance_ui_swiper()
    {
        return view('template.advance-ui.advance-ui-swiper');
    }
    public function advance_ui_tour()
    {
        return view('template.advance-ui.advance-ui-tour');
    }
}
