<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;

// guest
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// dashboard admin
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/admin/dashboard', [VehicleController::class, 'dashboard']);

    Route::get('/vehicles', [VehicleController::class, 'index']);
    Route::get('/vehicles/create', [VehicleController::class, 'create']);
    Route::post('/vehicles/store', [VehicleController::class, 'store']);
    Route::get('/vehicles/edit/{id}', [VehicleController::class, 'edit']);
    Route::post('/vehicles/update/{id}', [VehicleController::class, 'update']);
    Route::delete('/vehicles/delete/{id}', [VehicleController::class, 'destroy']);
    Route::get('/vehicles/detail/{id}', [VehicleController::class, 'show']);
    Route::delete('/vehicles/image/delete/{id}', [VehicleController::class, 'deleteImage']);
    Route::post('/vehicles/image/set-primary/{id}', [VehicleController::class, 'setPrimaryImage']);
});

// dashboard user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [VehicleController::class, 'userIndex']);
    Route::get('/user/vehicles/detail/{id}', [VehicleController::class, 'userShow']);

    Route::get('/booking/{id}', [BookingController::class, 'create']);
    Route::post('/booking/store', [BookingController::class, 'store']);

    Route::get('/pay/{id}', [PaymentController::class, 'create']);
    Route::post('/pay/select-method', [PaymentController::class, 'selectMethod']);
    Route::post('/pay/process', [PaymentController::class, 'processPayment']);
    Route::get('/pay/receipt/{id}', [PaymentController::class, 'receipt']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
    Route::post('/profile/password', [ProfileController::class, 'updatePassword']);


});



Route::get('/', function () {
    return redirect('/login');
});
