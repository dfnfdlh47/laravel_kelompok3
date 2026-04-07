<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\AdminController;

// Gunakan Alias agar tidak tertukar antara Controller User dan Admin
use App\Http\Controllers\BookingController as UserBookingController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

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
| AUTH (Breeze/Default)
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

    Route::get('/location', function () {
        return view('location'); 
    })->name('location');

    Route::get('/jambuka', function () {
    return view('jambuka');
})->name('jambuka');

    // --- RUTE BOOKING USER ---
    Route::get('/booking', [UserBookingController::class, 'index'])->name('booking');
    Route::get('/booking/create/{lapangan_id}', [UserBookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [UserBookingController::class, 'store'])->name('booking.store');
    Route::get('/lapangan', [LapanganController::class, 'index'])->name('lapangan.index');

    // Step 1: Halaman Pilih Metode Pembayaran
    Route::get('/payment/{id}', [UserBookingController::class, 'payment'])->name('payment');
    // Step 2: Update Metode
    Route::post('/payment/update/{id}', [UserBookingController::class, 'updateMetode'])->name('payment.update');

    // Step 3: Halaman Instruksi Bayar
    Route::get('/konfirmasi/{id}', [UserBookingController::class, 'konfirmasi'])->name('konfirmasi');
    // Step 4: Upload Bukti & Bayar
    Route::post('/pay/{id}', [UserBookingController::class, 'pay'])->name('pay');

    // Step 5: Halaman Menunggu / Sukses (Gunakan UserBookingController agar konsisten)
    Route::get('/booking/success/{id}', [UserBookingController::class, 'success'])->name('booking.success');

    // Step 6: Download Invoice
    Route::get('/invoice/{id}', [UserBookingController::class, 'invoice'])->name('invoice');

    // --- PROFIL ---
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
    
    // Rute: /admin/dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard'); 
    
    // Rute: /admin/booking (CRUD)
    Route::resource('booking', AdminBookingController::class);
    
    // Rute: /admin/lapangan (CRUD)
    Route::resource('lapangan', LapanganController::class);
});
