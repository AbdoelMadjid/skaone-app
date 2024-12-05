<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestSumatifController extends Controller
{
    public function index()
    {
        return view('pages.pesertadidik.test-sumatif');
    }
}
