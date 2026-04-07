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
            'lapangan_id' => $request->lapangan_id,
            'nama_pemesan' => $request->nama_pemesan,
            'no_hp' => $request->no_hp,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $jamSelesaiFormat,
            'durasi' => $request->durasi,
            'total_harga' => $totalHarga,
            'status' => 'pending'
        ]);

        return redirect()->route('payment', $booking->id);
    }

    // Menampilkan halaman Pilih Metode (payment.blade.php)
    public function payment($id)
    {
        $booking = Booking::findOrFail($id);
        return view('payment', compact('booking'));
    }

    // Menyimpan metode yang dipilih (Redirect ke Konfirmasi)
    public function updateMetode(Request $request, $id)
    {
        $request->validate(['metode_pembayaran' => 'required']);
        $booking = Booking::findOrFail($id);
        
        $booking->update([
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'pending'
        ]);

        return redirect()->route('konfirmasi', $booking->id);
    }

    // Menampilkan Instruksi Pembayaran (konfirmasi.blade.php)
    public function konfirmasi($id)
    {
        $booking = Booking::findOrFail($id);
        return view('konfirmasi', compact('booking'));
    }

    // Proses Final saat klik tombol "Konfirmasi & Kirim"
    public function pay(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $booking = Booking::findOrFail($id);
        
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_transfer', 'public');
            
            // Logika baru: Status jadi 'waiting' agar dicek admin dulu
           $booking->update([
    'bukti_pembayaran' => $path,
    'status' => 'pending' // Gunakan 'pending' jika 'waiting' tidak terdaftar di database
]);
        }

        // Dialihkan ke halaman sukses/tunggu, bukan langsung ke invoice
        return redirect()->route('booking.success', $booking->id);
    }

    // Menampilkan halaman informasi menunggu konfirmasi admin
    public function success($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.success', compact('booking'));
    }

    // Membuat dan Mengunduh PDF (Hanya bisa diakses jika status sudah 'confirmed')
    public function invoice($id)
    {
        $booking = Booking::with('user')->findOrFail($id);
        $pdf = Pdf::loadView('invoice', compact('booking'));
        return $pdf->download('Invoice_Futsal_'.$booking->id.'.pdf');
    }
}
