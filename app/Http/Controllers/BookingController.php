<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\Lapangan;

class BookingController extends Controller
{
    // Menampilkan Form Booking
    public function index()
    {
        return view('booking');
    }

    public function create($lapangan_id)
{
    $lapangan = Lapangan::findOrFail($lapangan_id);

    return view('booking.create', compact('lapangan'));
}

    // Memproses Form dan Menghitung Harga
    public function store(Request $request)
{
    $request->validate([
        'lapangan_id' => 'required',
        'nama_pemesan' => 'required',
        'no_hp' => 'required',
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'durasi' => 'required|integer|min:1'
    ]);

    $jamMulai = (int) substr($request->jam_mulai, 0, 2);

// hitung jam selesai
$jamSelesai = $jamMulai + $request->durasi;

// format jadi HH:00
$jamSelesaiFormat = str_pad($jamSelesai, 2, '0', STR_PAD_LEFT) . ':00';
    $totalHarga = 0;

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
        'lapangan_id' => $request->lapangan_id, // ✔️ FIX
        'nama_pemesan' => $request->nama_pemesan, // ✔️ TAMBAH
        'no_hp' => $request->no_hp, // ✔️ TAMBAH
        'tanggal' => $request->tanggal,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $jamSelesaiFormat,
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
        $booking->update(['status' => 'confirmed']);
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