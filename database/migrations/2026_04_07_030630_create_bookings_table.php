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
            
            // Relasi ke tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Relasi ke tabel lapangan
            $table->foreignId('lapangan_id')->constrained('lapangan')->onDelete('cascade');
            
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('durasi'); // dalam jam
            $table->integer('total_harga');
            $table->string('status')->default('pending'); // contoh status: pending, lunas, batal
            
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