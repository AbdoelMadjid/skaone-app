<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('pages.about.event', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Event::create($request->all());

        return response()->json(['success' => 'Event created successfully.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $event = Event::find($id);
        $event->update($request->all());

        return response()->json(['success' => 'Event updated successfully.']);
    }

    public function destroy($id)
    {
        Event::find($id)->delete();

        return response()->json(['success' => 'Event deleted successfully.']);
    }

    public function events()
    {
        $events = Event::all(['id', 'title', 'start_date as start', 'end_date as end']);
        return response()->json($events);
    }
}
