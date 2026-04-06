<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;

class LapanganController extends Controller
{
    /**
     * Tampilkan daftar semua lapangan.
     */
    public function index()
    {
        // Ambil semua data lapangan
        $lapangans = Lapangan::all();

        // Kirim data ke view 'lapangan.blade.php'
        return view('lapangan', compact('lapangans'));
    }
}