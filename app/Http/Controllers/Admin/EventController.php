<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/events', 'public');
        }

        Event::create($validated + [
            'title_en' => $request->title_en,
            'desc_en' => $request->desc_en,
            'location' => $request->location,
            'location_en' => $request->location_en,
            'location_url' => $request->location_url,
            'is_shown' => $request->boolean('is_shown'),
        ]);

        return redirect()->route('admin.events.index')->with('success', 'أضيفت الفعالية بحمد الله.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:10240',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/events', 'public');
        }


        $event->update($validated + [
            'title_en' => $request->title_en,
            'desc' => $request->desc,
            'desc_en' => $request->desc_en,
            'location' => $request->location,
            'location_en' => $request->location_en,
            'location_url' => $request->location_url,
            'is_shown' => $request->boolean('is_shown'),
        ]);

        return redirect()->route('admin.events.index')->with('success', 'عُدِّلت بيانات الفعالية.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('success', 'حُذِفت الفعالية');
    }
}
