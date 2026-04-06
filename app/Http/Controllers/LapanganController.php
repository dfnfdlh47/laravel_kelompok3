<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lapangan;

class LapanganController extends Controller
{
    public function index()
    {
      
        $data_lapangan = Lapangan::all(); 

        return view('lapangan', compact('data_lapangan'));
    }
}
