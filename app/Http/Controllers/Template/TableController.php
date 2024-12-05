<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function tables_basic()
    {
        return view('template.table.tables-basic');
    }
    public function tables_datatables()
    {
        return view('template.table.tables-datatables');
    }
    public function tables_gridjs()
    {
        return view('template.table.tables-gridjs');
    }
    public function tables_listjs()
    {
        return view('template.table.tables-listjs');
    }
}
