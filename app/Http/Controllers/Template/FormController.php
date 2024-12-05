<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function forms_advanced()
    {
        return view('template.form.forms-advanced');
    }
    public function forms_checkboxs_radios()
    {
        return view('template.form.forms-checkboxs-radios');
    }
    public function forms_editors()
    {
        return view('template.form.forms-editors');
    }
    public function forms_elements()
    {
        return view('template.form.forms-elements');
    }
    public function forms_file_uploads()
    {
        return view('template.form.forms-file-uploads');
    }
    public function forms_layouts()
    {
        return view('template.form.forms-layouts');
    }
    public function forms_masks()
    {
        return view('template.form.forms-masks');
    }
    public function forms_pickers()
    {
        return view('template.form.forms-pickers');
    }
    public function forms_range_sliders()
    {
        return view('template.form.forms-range-sliders');
    }
    public function forms_select()
    {
        return view('template.form.forms-select');
    }
    public function forms_select2()
    {
        return view('template.form.forms-select2');
    }
    public function forms_validation()
    {
        return view('template.form.forms-validation');
    }
    public function forms_wizard()
    {
        return view('template.form.forms-wizard');
    }
}
