<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttestationController;

Route::get('/', function () {
    return redirect('https://diplome.cd');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('attestations', AttestationController::class)->except(['show']);
});

Route::get('attestations/{attestation}',  [AttestationController::class, 'show'])->name('attestations.show');

require __DIR__.'/auth.php';
