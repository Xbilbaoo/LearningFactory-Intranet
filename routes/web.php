<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZereginaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('zereginak', ZereginaController::class)->parameters(['zereginak' => 'zeregina']);
    Route::middleware('role:admin')->group(function() {

        Route::get('/admin/panel', function() {

            return 'Kaixo Admin!';
        });
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
