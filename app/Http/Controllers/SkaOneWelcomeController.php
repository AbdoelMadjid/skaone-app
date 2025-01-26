<?php

namespace App\Http\Controllers;

use App\Models\WelcomeDataPersonil;
use Illuminate\Http\Request;

class SkaOneWelcomeController extends Controller
{
    public function artikel_guru_hebat()
    {
        return view('skaonewelcome.artikel-guru-hebat');
    }

    public function program()
    {
        return view('skaonewelcome.program');
    }

    public function future_students()
    {
        return view('skaonewelcome.future-students');
    }

    public function current_students()
    {
        return view('skaonewelcome.current-students');
    }

    public function faculty_and_staff()
    {
        $groupsPersonil = WelcomeDataPersonil::select('jenis_group')->distinct()->get();
        $personilData = WelcomeDataPersonil::all();
        return view('skaonewelcome.faculty-and-staff', compact('groupsPersonil', 'personilData'));
    }

    public function events()
    {
        return view('skaonewelcome.events');
    }

    public function alumni()
    {
        return view('skaonewelcome.alumni');
    }
}
