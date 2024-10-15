<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Landing page route
Route::get('/', function () {
    return view('layouts.landing');
});

// Dashboard route
Route::get('/dashboard', function () {
    $data['title'] = 'Pengguna';
    $data['breadcrumbs'][] = [
        'title' => 'Dashboard',
        'url' => route('dashboard')
    ];
    $data['breadcrumbs'][] = [
        'title' => 'Pengguna',
        'url' => route('users.index')
    ];

    return view('pages.dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes group
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource route for users
    Route::resource('users', UserController::class)->except(['create', 'edit']);
});

// Include authentication routes
require __DIR__.'/auth.php';
