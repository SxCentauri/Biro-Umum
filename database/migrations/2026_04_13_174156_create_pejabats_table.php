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
        Schema::create('pejabats', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('jabatan');
        $table->string('pangkat_golongan')->nullable();
        $table->string('nip')->nullable();
        $table->string('foto')->nullable();
        $table->enum('level', ['kepala', 'kabag_keuangan', 'kabag_rt', 'kabag_protokol', 'sub_keuangan', 'sub_rt', 'sub_protokol']);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pejabats');
    }
};
