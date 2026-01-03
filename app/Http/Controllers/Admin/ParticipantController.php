<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with('category')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.participants.index', compact('participants'));
    }

    public function show(Participant $participant)
    {
        return view('admin.participants.show', compact('participant'));
    }

    public function verify(Request $request, Participant $participant)
    {
        $participant->status = 'verified';
        $participant->save();
        return back()->with('success', 'Peserta diverifikasi.');
    }

    public function reject(Request $request, Participant $participant)
    {
        $participant->status = 'rejected';
        $participant->notes = $request->input('notes');
        $participant->save();
        return back()->with('success', 'Peserta ditolak.');
    }

    public function exportExcel()
    {
        return Excel::download(new ParticipantsExport, 'participants.xlsx');
    }

    public function exportPdf()
    {
        $participants = Participant::with('category')->get();
        $pdf = Pdf::loadView('admin.participants.pdf', compact('participants'));
        return $pdf->download('participants.pdf');
    }
}
