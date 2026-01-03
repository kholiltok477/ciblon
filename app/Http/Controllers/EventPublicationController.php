<?php

namespace App\Http\Controllers;

use App\Models\EventPublication;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class EventPublicationController extends Controller
{
    public function index()
    {
        $publications = EventPublication::where('status', 'approved')->latest()->paginate(10);
        return view('informasi', compact('publications'));
    }

    public function create(Request $request)
    {
        $package = $request->query('package', 'weekly');
        $packageDetails = $this->getPackageDetails($package);

        return view('event_publications.create', compact('packageDetails'));
    }

    public function store(Request $request)
    {
        // Auto-fix URLs if they don't start with http/https
        $urlFields = ['website', 'registration_link', 'guidebook_link'];
        foreach ($urlFields as $field) {
            if ($request->filled($field) && !Str::startsWith($request->$field, ['http://', 'https://'])) {
                $request->merge([$field => 'https://' . $request->$field]);
            }
        }

        $validated = $request->validate([
            'package_type' => 'required|string',
            'organizer_name' => 'required|string|max:255',
            'organizer_address' => 'required|string',
            'organizer_description' => 'required|string',
            'instagram' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'required|image|max:2048',

            // New fields
            'registration_periods' => 'required|array',
            'registration_periods.*.name' => 'required|string',
            'registration_periods.*.start_date' => 'required|date',
            'registration_periods.*.end_date' => 'required|date|after_or_equal:registration_periods.*.start_date',
            'payment_type' => 'required|string',
            'category' => 'required|string',
            'target_audience' => 'required|string',
            'activity_type' => 'required|string',
            'activity_level' => 'required|string',
            'registration_link' => 'required|url',
            'guidebook_link' => 'required|url',
            'whatsapp_number' => 'required|string',
            'poster' => 'required|image|max:5120', // Increased to 5MB, removed dimensions
        ], [
            // Custom Messages
            'registration_link.url' => 'Link pendaftaran harus berupa URL yang valid (awali dengan http:// atau https://).',
            'guidebook_link.url' => 'Link panduan harus berupa URL yang valid (awali dengan http:// atau https://).',
            'registration_periods.*.end_date.after_or_equal' => 'Tanggal selesai gelombang harus setelah atau sama dengan tanggal mulai.',
            'poster.max' => 'Ukuran poster maksimal 5MB.',
        ]);

        $packageDetails = $this->getPackageDetails($request->package_type);

        $logoPath = $request->file('logo')->store('organizer_logos', 'public');
        $posterPath = $request->file('poster')->store('event_posters', 'public');

        $publication = EventPublication::create([
            'user_id' => auth()->id(),
            'package_name' => $packageDetails['name'],
            'package_price' => $packageDetails['price_raw'],
            'organizer_name' => $validated['organizer_name'],
            'organizer_address' => $validated['organizer_address'],
            'organizer_description' => $validated['organizer_description'],
            'instagram' => $validated['instagram'],
            'website' => $validated['website'],
            'logo_path' => $logoPath,

            // New fields storage
            'registration_periods' => $validated['registration_periods'],
            'payment_type' => $validated['payment_type'],
            'category' => $validated['category'],
            'target_audience' => $validated['target_audience'],
            'activity_type' => $validated['activity_type'],
            'activity_level' => $validated['activity_level'],
            'registration_link' => $validated['registration_link'],
            'guidebook_link' => $validated['guidebook_link'],
            'whatsapp_number' => $validated['whatsapp_number'],
            'poster_path' => $posterPath,
            'status' => 'pending_payment',
        ]);

        return redirect()->route('publications.payment', $publication->id);
    }

    public function payment(EventPublication $publication)
    {
        if ($publication->user_id !== auth()->id()) {
            abort(403);
        }
        return view('event_publications.payment', compact('publication'));
    }

    public function processPayment(Request $request, EventPublication $publication)
    {
        if ($publication->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'payment_proof' => 'required|image|max:2048',
        ]);

        $path = $request->file('payment_proof')->store('payment_proofs', 'public');

        $publication->update([
            'payment_proof_path' => $path,
            'status' => 'pending' // Now truly pending admin review
        ]);

        // Send Telegram Notification
        $telegram = new \App\Services\TelegramService();
        $message = "<b>🚀 Konfirmasi Pembayaran Lomba!</b>\n\n"
            . "<b>Penyelenggara:</b> {$publication->organizer_name}\n"
            . "<b>Paket:</b> {$publication->package_name}\n"
            . "<b>Harga:</b> Rp " . number_format($publication->package_price, 0, ',', '.') . "\n"
            . "<b>Instagram:</b> @{$publication->instagram}\n"
            . "<b>Status:</b> Bukti Pembayaran Diunggah\n\n"
            . "Silakan cek panel admin untuk melakukan verifikasi.";

        $telegram->sendMessage($message);

        return redirect()->route('informasi')->with('success', 'Bukti pembayaran berhasil diunggah! Admin akan segera melakukan verifikasi.');
    }

    private function getPackageDetails($type)
    {
        switch ($type) {
            case 'monthly':
                return [
                    'name' => 'Bulanan',
                    'price' => 'Rp 17.000',
                    'price_raw' => 17000,
                    'type' => 'monthly'
                ];
            case 'premium':
                return [
                    'name' => '2 Bulan - Premium',
                    'price' => 'Rp 37.000',
                    'price_raw' => 37000,
                    'type' => 'premium'
                ];
            case 'weekly':
            default:
                return [
                    'name' => 'Mingguan',
                    'price' => 'Rp 5.000',
                    'price_raw' => 5000,
                    'type' => 'weekly'
                ];
        }
    }
}
