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
        Schema::create('katalog_produk', function (Blueprint $table) {
            $table->id('id_produk'); // 
            $table->string('Nama_produk', 100);
            $table->string('Warna_produk', 50);
            $table->integer('Berat');
            $table->string('Merk', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_produk');
    }
};