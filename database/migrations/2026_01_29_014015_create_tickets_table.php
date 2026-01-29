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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Siapa yang lapor
        $table->string('judul_laporan'); // Contoh: "Internet Mati di Ruang Rapat"
        $table->text('deskripsi_masalah'); // Detail masalah
        $table->string('lokasi_ruangan'); // Contoh: "Lantai 2, Ruang Arsip"
        $table->string('foto_bukti')->nullable(); // Path foto yang diupload

        // Status tiket: Menunggu, Diproses, Selesai
        $table->enum('status', ['pending', 'process', 'done'])->default('pending');

        $table->text('catatan_teknisi')->nullable(); // Diisi admin saat selesai
        $table->timestamp('tanggal_selesai')->nullable(); // Kapan diperbaiki

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
