<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = EventPublication::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function edit(EventPublication $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, EventPublication $event)
    {
        $request->validate([
            'status' => 'required|in:pending,pending_payment,approved,rejected',
        ]);

        $event->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event status updated successfully.');
    }

    public function destroy(EventPublication $event)
    {
        if ($event->logo_path) {
            Storage::disk('public')->delete($event->logo_path);
        }
        if ($event->poster_path) {
            Storage::disk('public')->delete($event->poster_path);
        }

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
