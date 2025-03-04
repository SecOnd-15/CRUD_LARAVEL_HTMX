<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display all events
    public function index()
{
    $events = Event::all(); // Fetch all events from the database
    return view('events.index', compact('events')); // Pass events to the Blade file
}

public function dashboard()
{
    $events = Event::all(); // Fetch events
    return view('dashboard', compact('events')); // Pass events to dashboard
}

    // Show the form to create a new event
    public function create()
    {
        return view('create');
    }

    // Store a new event in the database
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'description' => 'nullable|string',
        ]);

        // Debugging: Check incoming request data
        // dd($validated); // Uncomment this to check the request before inserting

        // Store event in the database
        try {
            Event::create($validated);
            return redirect()->route('events.index')->with('success', 'Event created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

public function update(Request $request, Event $event)
{
  // Find the event by ID
  $event = Event::find($request->id);

  // Check if event exists
  if (!$event) {
      return redirect()->back()->with('error', 'Event not found.');
  }

  // Manually assign values and save
  $event->event_name = $request->event_name;
  $event->event_date = $request->event_date;
  $event->event_time = $request->event_time;
  $event->description = $request->description;
  
  $event->save(); // Save the updated event


    try {
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}

public function edit($id){

    $event = Event::find($id);
    return view('edit', [
        'event' => $event,
    ]);
}

    // Delete an event from the database
    public function destroy($id)
    {
        $event = Event::findOrFail($id); // Find the event
        $event->delete(); // Delete the event
    
        return response('', 200); // Send an empty response
    }
    
}
