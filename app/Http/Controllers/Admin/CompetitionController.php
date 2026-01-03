<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Event::latest()->paginate(10);
        return view('admin.competitions.index', compact('competitions'));
    }

    public function create()
    {
        return view('admin.competitions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'location' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'registration_fee' => 'nullable|string',
            'registration_link' => 'nullable|url',
        ]);

        $data = $request->all();
        $data['created_by'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.competitions.index')->with('success', 'Competition created successfully.');
    }

    public function edit(Event $competition)
    {
        return view('admin.competitions.edit', compact('competition'));
    }

    public function update(Request $request, Event $competition)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'location' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'registration_fee' => 'nullable|string',
            'registration_link' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($competition->image) {
                Storage::disk('public')->delete($competition->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $competition->update($data);

        return redirect()->route('admin.competitions.index')->with('success', 'Competition updated successfully.');
    }

    public function destroy(Event $competition)
    {
        if ($competition->image) {
            Storage::disk('public')->delete($competition->image);
        }
        $competition->delete();

        return redirect()->route('admin.competitions.index')->with('success', 'Competition deleted successfully.');
    }
}
