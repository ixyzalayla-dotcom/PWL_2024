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
        Schema::create('m_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 20)->unique();
            $table->string('nama_barang');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('kategori_id')->index();
            $table->decimal('harga', 10, 2);
            $table->integer('stok')->default(0);
            $table->timestamps();

            // Foreign key ke tabel m_kategori
            $table->foreign('kategori_id')->references('id')->on('m_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_barang');
    }
};
