<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/galeria', [PageController::class, 'gallery'])->name('gallery');
Route::get('/foglalas', [PageController::class, 'create'])->name('reservation.create');

Route::post('/confirm', [PageController::class, 'confirm'])->name('reservations.confirm');
Route::post('/elkuldve', [PageController::class, 'store'])->name('reservations.store');
Route::post('/back', [PageController::class, 'back'])->name('reservations.back');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/foglalasok', [PageController::class, 'index'])->name('reservation.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
