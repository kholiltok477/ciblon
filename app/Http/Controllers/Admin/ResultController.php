<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Participant;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('participant')->orderBy('position')->get();
        return view('admin.results.index', compact('results'));
    }

    public function create()
    {
        $participants = Participant::where('status', 'verified')->get();
        return view('admin.results.create', compact('participants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'position' => 'required|string',
            'time' => 'nullable|string',
        ]);

        Result::create($request->only('participant_id', 'position', 'time', 'notes'));
        return redirect()->route('admin.results.index')->with('success', 'Hasil disimpan.');
    }
}
