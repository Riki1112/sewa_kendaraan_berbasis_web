<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/google/two-factor-challenge', [GoogleController::class, 'showTwoFactorChallenge'])
    ->name('google.2fa.challenge');

Route::post('/google/two-factor-challenge', [GoogleController::class, 'verifyTwoFactorChallenge'])
    ->name('google.2fa.verify');

Route::middleware(['auth'])->group(function () {
    Route::view('/security', 'profile.security')->name('security');
});