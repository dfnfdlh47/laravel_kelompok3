<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LapanganController; 
use App\Http\Controllers\BookingController as UserBookingController;

// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| USER LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('index');
    })->name('home');

    // Navbar

    Route::get('/jam-buka', fn () => view('jambuka'))->name('jambuka');
    Route::get('/location', fn () => view('location'))->name('location');

    // BOOKING USER
    Route::get('/booking', [UserBookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/create/{lapangan_id}', [UserBookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [UserBookingController::class, 'store'])->name('booking.store');

    Route::get('/payment/{id}', [UserBookingController::class, 'payment'])->name('payment');
    Route::post('/payment/{id}', [UserBookingController::class, 'pay'])->name('payment.pay');

    Route::get('/invoice/{id}', [UserBookingController::class, 'invoice'])->name('invoice');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard.view');

    Route::resource('booking', AdminBookingController::class);
});

/*
|--------------------------------------------------------------------------
| RESOURCE UMUM
|--------------------------------------------------------------------------
*/
Route::resource('lapangan', LapanganController::class);