<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/{tenant}/teste-tenant', function () {
    $tenant = app('tenant');

    return "Tenant atual: " . $tenant->name;
});
Route::get('/{tenant}/services', [ServiceController::class, 'index']);
Route::get('/{tenant}/services/create', [ServiceController::class, 'create']);
Route::post('/{tenant}/services', [ServiceController::class, 'store']);
Route::get('/{tenant}/professionals', [ProfessionalController::class, 'index']);
Route::get('/{tenant}/professionals/create', [ProfessionalController::class, 'create']);
Route::post('/{tenant}/professionals', [ProfessionalController::class, 'store']);
Route::get('/{tenant}/clients', [ClientController::class, 'index']);
Route::get('/{tenant}/clients/create', [ClientController::class, 'create']);
Route::post('/{tenant}/clients', [ClientController::class, 'store']);
Route::get('/{tenant}/appointments', [AppointmentController::class, 'index']);
Route::get('/{tenant}/appointments/create', [AppointmentController::class, 'create']);
Route::post('/{tenant}/appointments', [AppointmentController::class, 'store']);
});

require __DIR__.'/auth.php';
