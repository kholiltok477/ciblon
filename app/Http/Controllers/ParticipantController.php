<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    /**
     * Tampilkan halaman form pendaftaran peserta
     */
    public function create()
    {
        // Ambil semua kategori lomba dari database
        $categories = Category::all();

        // Kirim ke view participants.create
        return view('participants.create', compact('categories'));
    }

    /**
     * Simpan data peserta yang dikirim dari form
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:participants,email',
            'phone'            => 'required|string|max:15',
            'birth_date'       => 'required|date',
            'category_id'      => 'required|exists:categories,id',
            'photo'            => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'payment_proof'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'notes'            => 'nullable|string',
        ]);

        // Ambil data input yang valid
        $data = $request->only([
            'full_name', 'email', 'phone', 'birth_date', 'category_id', 'notes'
        ]);

        // Upload foto peserta
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('participants/photos', 'public');
        }

        // Upload bukti pembayaran
        if ($request->hasFile('payment_proof')) {
            $data['payment_proof_path'] = $request->file('payment_proof')->store('participants/payments', 'public');
        }

        // Simpan ke database
        Participant::create($data);

        // Redirect ke halaman ucapan terima kasih
        return redirect()->route('participants.thanks')
                         ->with('success', 'Terima kasih, pendaftaran berhasil! Data kamu sedang diverifikasi.');
    }

    /**
     * Tampilkan halaman terima kasih setelah pendaftaran
     */
    public function thanks()
    {
        return view('participants.thanks');
    }
}
