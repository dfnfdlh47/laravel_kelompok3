<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Lapangan extends Model
{
    use HasFactory;

    protected $table = 'lapangans';

    // Daftarkan nama kolom yang boleh diisi dari form
    protected $fillable = [
        'nama_lapangan',
        'jenis_lapangan',
        'harga_per_jam',
        'deskripsi',
    ];

    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}