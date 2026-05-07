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
        Schema::create('m_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->autoIncrement()->primary();
            $table->string('username', 20)->unique();
            $table->unsignedBigInteger('level_id')->index();
            $table->string('nama');
            $table->string('password');
            $table->timestamps();

            // Foreign key pada kolom level_id mengacu pada kolom id di tabel m_level
            $table->foreign('level_id')->references('id')->on('m_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
