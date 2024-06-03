<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HealthInformationController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('users.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('home.index');
});


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);

});

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('admin/dashboard', [AdminController::class, 'index']);
  Route::get('/admin/doctors', [DoctorController::class, 'index'])->name('admin/doctors');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', AdminController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('queues', QueueController::class);
    Route::resource('medical_records', MedicalRecordController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('health_informations', HealthInformationController::class);
});



require __DIR__ . '/auth.php';



