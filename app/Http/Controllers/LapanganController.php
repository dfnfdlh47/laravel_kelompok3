<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lapangan;

class LapanganController extends Controller
{
public function index()
{
    $lapangans = Lapangan::all(); // Mengambil semua data
    return view('lapangan', compact('lapangans')); // Dikirim sebagai $lapangans
}
}
