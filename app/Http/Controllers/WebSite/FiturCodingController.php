<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\FiturCodingDataTable;
use App\Models\WebSite\FiturCoding;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\FiturCodingRequest;

class FiturCodingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FiturCodingDataTable $fiturCodingDataTable)
    {
        // Handle the fitur coding section
        return $fiturCodingDataTable->render('pages.website.fitur-coding');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.website.fitur-coding-form', [
            'data' => new FiturCoding(),
            'action' => route('websiteapp.fitur-coding.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FiturCodingRequest $request)
    {
        $fiturCoding = new FiturCoding($request->validated());
        $fiturCoding->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(FiturCoding $fiturCoding)
    {
        return view('pages.website.fitur-coding-form', [
            'data' => $fiturCoding,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FiturCoding $fiturCoding)
    {
        return view('pages.website.fitur-coding-form', [
            'data' => $fiturCoding,
            'action' => route('websiteapp.fitur-coding.update', $fiturCoding->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FiturCodingRequest $request, FiturCoding $fiturCoding)
    {
        $fiturCoding->fill($request->validated());
        $fiturCoding->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FiturCoding $fiturCoding)
    {
        $fiturCoding->delete();

        return responseSuccessDelete();
    }
}
