<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventPublication;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalEvents = EventPublication::count();
        $pendingEvents = EventPublication::where('status', 'pending_payment')->orWhere('status', 'pending')->count();
        $revenue = EventPublication::where('status', 'approved')->sum('package_price');
        $recentEvents = EventPublication::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalEvents', 'pendingEvents', 'revenue', 'recentEvents'));
    }
}
