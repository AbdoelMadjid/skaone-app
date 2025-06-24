<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\PollingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\PollingRequest;
use App\Models\About\Polling;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PollingDataTable $pollingDataTable)
    {
        // Handle the polling section
        return $pollingDataTable->render('pages.about.polling');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.polling-form', [
            'data' => new Polling(),
            'action' => route('about.polling.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PollingRequest $request)
    {
        $polling = new Polling($request->validated());
        $polling->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Polling $polling)
    {
        return view('pages.about.polling-form', [
            'data' => $polling
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polling $polling)
    {
        return view('pages.about.polling-form', [
            'data' => $polling,
            'action' => route('about.polling.update', $polling->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PollingRequest $request, Polling $polling)
    {
        $polling->fill($request->validated());
        $polling->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        $polling->delete();

        return responseSuccessDelete();
    }
}
