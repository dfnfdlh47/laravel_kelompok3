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
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lapangan'); // Contoh: "Lapangan Futsal A", "Vinyl 1"
            $table->string('jenis_lapangan')->nullable(); // Contoh: "Futsal", "Badminton"
            $table->integer('harga_per_jam'); // Contoh: 100000
            $table->text('deskripsi')->nullable(); // Opsional: untuk penjelasan fasilitas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangans');
    }
};