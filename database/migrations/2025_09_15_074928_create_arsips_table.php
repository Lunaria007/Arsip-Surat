<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('judul');
            $table->string('file_path'); // Kolom untuk menyimpan path file PDF
            $table->foreignId('kategori_id')->constrained('kategoris'); // Foreign Key ke tabel kategoris
            $table->timestamps(); // Ini akan membuat kolom created_at (Waktu Pengarsipan)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
