<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestFormatifController extends Controller
{
    public function index()
    {
        return view('pages.pesertadidik.test-formatif');
    }
}
