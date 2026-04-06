<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Lapangan;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
 public function create(Request $request)
{
    if (!$request->lapangan_id) {
        abort(404);
    }

    $lapangan = Lapangan::findOrFail($request->lapangan_id);

    return view('booking', compact('lapangan'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    Booking::create([
        'user_id' => Auth::id(),
        'lapangan_id' => $request->lapangan_id,
        'nama_pemesan' => Auth::user()->name, // 🔥 otomatis dari login
        'no_hp' => $request->no_hp,
        'tanggal' => $request->tanggal,
        'jam_mulai' => $request->jam_mulai,
        'durasi' => $request->durasi,
        'total_harga' => $request->total_harga,
        'status' => 'pending',
    ]);

    return redirect()->route('admin.booking.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('admin.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('admin.booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back();
    }
}
