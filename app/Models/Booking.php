<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lapangan;

class Booking extends Model
{
    use HasFactory;

    // Daftar semua kolom yang diizinkan untuk diisi data (Mass Assignment)
    protected $fillable = [
        'user_id',
        'lapangan_id',
        'nama_pemesan',
        'no_hp',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'durasi',
        'total_harga',
        'status'
    ];

    // Relasi: Setiap Booking dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

 public function lapangan()
{
    return $this->belongsTo(Lapangan::class, 'lapangan_id');
}
}