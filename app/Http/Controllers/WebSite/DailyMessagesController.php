<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\DailyMessagesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\DailyMessagesRequest;
use App\Models\WebSite\DailyMessages;
use Illuminate\Http\Request;

class DailyMessagesController extends Controller
{
    public function index(DailyMessagesDataTable $dailyMessagesDataTable)
    {
        return $dailyMessagesDataTable->render('pages.website.daily-messages');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.website.daily-messages-form', [
            'data' => new DailyMessages(),
            'action' => route('websiteapp.daily-messages.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DailyMessagesRequest $request)
    {
        $dailyMessage = new DailyMessages($request->validated());
        $dailyMessage->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyMessages $dailyMessage)
    {
        return view('pages.website.daily-messages-form', [
            'data' => $dailyMessage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyMessages $dailyMessage)
    {
        return view('pages.website.daily-messages-form', [
            'data' => $dailyMessage,
            'action' => route('websiteapp.daily-messages.update', $dailyMessage->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DailyMessagesRequest $request, DailyMessages $dailyMessage)
    {
        $dailyMessage->fill($request->validated());
        $dailyMessage->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyMessages $dailyMessage)
    {
        $dailyMessage->delete();

        return responseSuccessDelete();
    }
}
