<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar semua booking (untuk Admin).
     */
    public function index()
    {
        // Mengambil data booking beserta relasi user dan lapangan agar tidak N+1 Query
        $bookings = Booking::with(['user', 'lapangan'])
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam_mulai', 'desc')
            ->get();

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Menampilkan form untuk membuat booking manual oleh Admin.
     */
    public function create()
    {
        $users = User::all(); // Untuk memilih akun mana yang memesan
        $lapangans = Lapangan::all(); // Untuk memilih lapangan mana
        return view('admin.booking.create', compact('users', 'lapangans'));
    }

    /**
     * Menyimpan data booking baru dari Admin.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,id',
            'lapangan_id'   => 'required|exists:lapangan,id',
            'nama_pemesan'  => 'required|string|max:255',
            'no_hp'         => 'required|string|max:20',
            'tanggal'       => 'required|date',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required',
            'durasi'        => 'required|integer',
            'total_harga'   => 'required|numeric',
            'status'        => 'required|in:Booking,Lunas,Batal',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.booking.index')
            ->with('success', 'Pesanan baru berhasil ditambahkan secara manual.');
    }

    /**
     * Menampilkan detail booking (opsional, biasanya langsung di Index/Edit).
     */
    public function show(Booking $booking)
    {
        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Menampilkan form edit untuk mengubah data/status booking.
     */
    public function edit(Booking $booking)
    {
        $users = User::all();
        $lapangans = Lapangan::all();
        return view('admin.booking.edit', compact('booking', 'users', 'lapangans'));
    }

    /**
     * Memperbarui data booking (Ubah status, ganti jam, dll).
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,id',
            'lapangan_id'   => 'required|exists:lapangan,id',
            'nama_pemesan'  => 'required|string|max:255',
            'no_hp'         => 'required|string|max:20',
            'tanggal'       => 'required|date',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required',
            'durasi'        => 'required|integer',
            'total_harga'   => 'required|numeric',
            'status'        => 'required|in:Booking,Lunas,Batal',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.booking.index')
            ->with('success', 'Data booking #' . $booking->id . ' berhasil diperbarui!');
    }

    /**
     * Menghapus data booking dari database.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.booking.index')
            ->with('success', 'Data booking telah berhasil dihapus dari sistem.');
    }
}