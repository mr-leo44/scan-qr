<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttestationController;

Route::get('/', function () {
    if(Auth::user()){
        return redirect(RouteServiceProvider::HOME);
    } elseif(User::count() === 0){
        $user = User::create([
           'name' => 'admin',
           'email' => 'admin@diplome.cd',
           'password' => Hash::make('Admin0000')
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    } else {
        return redirect('https://diplome.cd');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('attestations', AttestationController::class)->except(['show']);
    Route::post('attestations/{attestation}/generatepdf',  [AttestationController::class, 'generatePDF'])->name('attestations.generatePDF');
    // Route::get('generated',  [AttestationController::class, 'generated'])->name('attestations.generated');
});

Route::get('attestations/{attestation}',  [AttestationController::class, 'show'])->name('attestations.show');

require __DIR__.'/auth.php';
