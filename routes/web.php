<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/user', [DashboardController::class, 'index'])->name('user');
});

require __DIR__.'/auth.php';



// Route::get('home/dashboard', [HomeController::class, 'index']);

Route::get('admin/dashboard', [DashboardController::class, 'index']);

=======
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


