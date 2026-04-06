<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel users (Dari kodingan 1)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Data tambahan (Dari kodingan 2) - Dibuat nullable agar tidak error dengan sistem sebelumnya
            $table->string('nama_pemesan')->nullable();
            $table->string('no_hp')->nullable();
            
            // Waktu booking (Gabungan 1 & 2)
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai')->nullable(); 
            $table->integer('durasi'); // dalam jam (penting untuk hitung harga)
            
            // Pembayaran (Dari kodingan 1)
            $table->integer('total_harga');
            
            // Status booking (Gabungan semua status dari kodingan 1 & 2)
            $table->enum('status', ['pending', 'paid', 'confirmed', 'cancelled'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};