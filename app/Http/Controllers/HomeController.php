<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $news = News::where('is_published', true)->latest()->take(3)->get();
        $upcomingEvents = Event::where('start_date', '>=', now())->orderBy('start_date')->take(4)->get();

        return view('dashboard', compact('settings', 'news', 'upcomingEvents'));
    }
}
