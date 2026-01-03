<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\Admin\ParticipantController as AdminParticipantController;
use App\Http\Controllers\Admin\ResultController as AdminResultController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventPublicationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/informasi', [EventPublicationController::class, 'index'])->name('informasi');
Route::get('/sejarah', function () {
    return view('sejarah');
})->name('sejarah');
Route::get('/tim-pengembangan', [App\Http\Controllers\DevelopmentTeamController::class, 'index'])->name('development-team');
Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

// Participant registration
Route::get('/pendaftaran', [ParticipantController::class, 'create'])->name('participants.create');
Route::post('/pendaftaran', [ParticipantController::class, 'store'])->name('participants.store');
Route::get('/pendaftaran/thanks', [ParticipantController::class, 'thanks'])->name('participants.thanks');

// Google Auth
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // New Resources
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::resource('events', App\Http\Controllers\Admin\EventController::class)->except(['create', 'store', 'show']);

        // Existing (Keep them for now, might migrate later)
        Route::get('/participants', [AdminParticipantController::class, 'index'])->name('participants.index');
        Route::get('/participants/{participant}', [AdminParticipantController::class, 'show'])->name('participants.show');
        Route::post('/participants/{participant}/verify', [AdminParticipantController::class, 'verify'])->name('participants.verify');
        Route::post('/participants/{participant}/reject', [AdminParticipantController::class, 'reject'])->name('participants.reject');
        Route::get('/export/excel', [AdminParticipantController::class, 'exportExcel'])->name('participants.export.excel');
        Route::get('/export/pdf', [AdminParticipantController::class, 'exportPdf'])->name('participants.export.pdf');

        Route::get('/results', [AdminResultController::class, 'index'])->name('results.index');
        Route::get('/results/create', [AdminResultController::class, 'create'])->name('results.create');
        Route::post('/results', [AdminResultController::class, 'store'])->name('results.store');

        // New Admin Features
        Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
        Route::resource('competitions', App\Http\Controllers\Admin\CompetitionController::class);
        Route::resource('team', App\Http\Controllers\Admin\TeamMemberController::class)->parameters(['team' => 'teamMember']);
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::patch('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });

    // Event Publication routes
    Route::get('/event-publication/create', [EventPublicationController::class, 'create'])->name('publications.create');
    Route::post('/event-publication/store', [EventPublicationController::class, 'store'])->name('publications.store');
    Route::get('/event-publication/payment/{publication}', [EventPublicationController::class, 'payment'])->name('publications.payment');
    Route::post('/event-publication/process-payment/{publication}', [EventPublicationController::class, 'processPayment'])->name('publications.processPayment');
});

require __DIR__ . '/auth.php';
