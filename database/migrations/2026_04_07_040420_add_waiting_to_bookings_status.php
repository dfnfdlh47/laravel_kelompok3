<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB; // Pastikan ini di-import di atas

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Menggunakan Native SQL agar perubahan ENUM tidak dicekal oleh Laravel/Doctrine
    DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'confirmed', 'waiting', 'cancelled') DEFAULT 'pending'");
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    // Mengembalikan ke status awal jika migration di-rollback
    DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'confirmed') DEFAULT 'pending'");
}
};
