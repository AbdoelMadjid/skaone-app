<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\DailyMessagesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\DailyMessagesRequest;
use App\Models\About\DailyMessages;
use Illuminate\Http\Request;

class DailyMessagesController extends Controller
{
    public function index(DailyMessagesDataTable $dailyMessagesDataTable)
    {
        return $dailyMessagesDataTable->render('pages.about.daily-messages');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.daily-messages-form', [
            'data' => new DailyMessages(),
            'action' => route('about.daily-messages.store')
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
        return view('pages.about.daily-messages-form', [
            'data' => $dailyMessage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyMessages $dailyMessage)
    {
        return view('pages.about.daily-messages-form', [
            'data' => $dailyMessage,
            'action' => route('about.daily-messages.update', $dailyMessage->id)
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
