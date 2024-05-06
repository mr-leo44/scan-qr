<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttestationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AttestationController::class, 'index'])->name('attestations.index');
Route::resource('/attestations', AttestationController::class)->except('index');
Route::get('/qrcode/{attestation}', [AttestationController::class, 'generateQrCode'])->name('qrcode');
/* Route::get('/generate', [AttestationController::class, 'generate'])->name('generate');
 */
