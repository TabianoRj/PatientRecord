<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

route::get('home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/patient', [PatientController::class, 'patientRecord'])->middleware(['auth', 'admin'])->name('patient.patient-record');
Route::get('/patient/create', [PatientController::class, 'create'])->middleware(['auth', 'admin'])->name('patient.create');
Route::post('/patient', [PatientController::class, 'store'])->middleware(['auth', 'admin'])->name('patient.store');
Route::get('/patient/{patient}/edit', [PatientController::class, 'edit'])->middleware(['auth', 'admin'])->name('patient.edit');
Route::put('/patient/{patient}/update', [PatientController::class, 'update'])->middleware(['auth', 'admin'])->name('patient.update');
Route::delete('/patient/{patient}/delete', [PatientController::class, 'delete'])->middleware(['auth', 'admin'])->name('patient.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
