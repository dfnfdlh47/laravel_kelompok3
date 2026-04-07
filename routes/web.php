<?php

// Import Controller User
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LapanganController; 
use App\Http\Controllers\BookingController as UserBookingController; // Menggunakan alias untuk Booking User

// Import Controller Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController; // Menggunakan alias untuk Booking Admin

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GUEST (BELUM LOGIN)
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

    // Halaman Utama User
    Route::get('/home', function () {
        return view('index'); // Pastikan ini mengarah ke file view dashboard user kamu
    })->name('home');

    // --- Rute Navbar Utama ---
    Route::get('/lapangan', [LapanganController::class, 'index'])->name('lapangan.index');
    
    Route::get('/jam-buka', function () {
        return view('jambuka'); 
    })->name('jambuka');

    Route::get('/location', function () {
        return view('location'); 
    })->name('location');
    // -------------------------

    // --- RUTE BOOKING USER (Sistem Pemesanan, Pembayaran, dan Invoice) ---
     
    Route::get('/booking', [UserBookingController::class, 'index'])->name('booking');
Route::get('/booking/create/{lapangan_id}', [UserBookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [UserBookingController::class, 'store'])->name('booking.store');
    Route::get('/payment/{id}', [UserBookingController::class, 'payment'])->name('payment');
    Route::post('/payment/{id}', [UserBookingController::class, 'pay'])->name('payment.pay');
    Route::get('/invoice/{id}', [UserBookingController::class, 'invoice'])->name('invoice');
    // ------------------------------------------------------------- --------

    // Rute Profil Bawaan Breeze/UI
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/booking', function () {
    return view('booking');
})->name('booking');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
Route::get('/dashboard', fn () => view('admin.dashboard'));
Route::resource('booking', AdminBookingController::class);
});


Route::resource('lapangan', LapanganController::class);


// Menggabungkan middleware 'role:admin' dan prefix 'admin' agar lebih aman dan rapi
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute: /admin
    Route::get('/', [AdminController::class, 'index'])->name('dashboard'); 
    
    // Rute: /admin/dashboard
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard.view'); 
    
    // Rute: /admin/booking (Hanya admin yang bisa akses CRUD booking)
    // Menggunakan AdminBookingController dari folder Admin
    Route::resource('booking', AdminBookingController::class);
    
});     
