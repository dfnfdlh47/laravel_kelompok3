<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Lapangan;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil data ringkasan untuk Dashboard
        $totalBooking = Booking::count();
        $totalPendapatan = Booking::where('status', 'lunas')->sum('total_harga'); // Sesuaikan jika ada status lain
        $totalUser = User::where('role', 'user')->count();
        $totalLapangan = Lapangan::count();

        // Mengambil 5 booking terbaru untuk tabel ringkasan
        $recentBookings = Booking::with(['user', 'lapangan'])
                                 ->latest()
                                 ->take(5)
                                 ->get();

        return view('admin.booking.dashboard', compact(
            'totalBooking', 
            'totalPendapatan', 
            'totalUser', 
            'totalLapangan', 
            'recentBookings'
        ));
    }
}