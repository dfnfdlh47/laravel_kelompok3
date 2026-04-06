<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan Form Booking
    public function index()
    {
        return view('booking');
    }

    // Memproses Form dan Menghitung Harga
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'durasi' => 'required|integer|min:1'
        ]);

        $jamMulai = (int) substr($request->jam_mulai, 0, 2);
        $totalHarga = 0;

        // Logika perhitungan harga per jam
        for ($i = 0; $i < $request->durasi; $i++) {
            $jamSekarang = $jamMulai + $i;

            if ($jamSekarang >= 7 && $jamSekarang < 15) {
                $totalHarga += 100000;
            } elseif ($jamSekarang >= 15 && $jamSekarang < 16) {
                $totalHarga += 130000;
            } elseif ($jamSekarang >= 16 && $jamSekarang < 18) {
                $totalHarga += 140000;
            } elseif ($jamSekarang >= 18 && $jamSekarang < 23) {
                $totalHarga += 155000;
            } else {
                return back()->with('error', 'Jam di luar operasional (07.00 - 23.00)');
            }
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'lapangan_id' => 1,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'durasi' => $request->durasi,
            'total_harga' => $totalHarga,
            'status' => 'pending'
        ]);

        return redirect()->route('payment', $booking->id);
    }

    // Menampilkan Halaman Pembayaran
    public function payment($id)
    {
        $booking = Booking::findOrFail($id);
        return view('payment', compact('booking'));
    }

    // Memproses Pembayaran menjadi Lunas
    public function pay($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'paid']);
        return redirect()->route('invoice', $booking->id);
    }

    // Membuat dan Mengunduh PDF
    public function invoice($id)
    {
        $booking = Booking::with('user')->findOrFail($id);
        $pdf = Pdf::loadView('invoice', compact('booking'));
        return $pdf->download('Invoice_Futsal_'.$booking->id.'.pdf');
    }
}