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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->constrained('pelanggan'); // Foreign key ke tabel pelanggan
            $table->foreignId('id_produk')->constrained('products'); // Foreign key ke tabel produk
            $table->integer('harga'); // Harga produk
            $table->string('tipe'); // Tipe produk (jika diperlukan, bisa menjadi foreign key jika tipe produk dikelola di tabel terpisah)
            $table->text('deskripsi'); // Deskripsi produk
            $table->string('gambar'); // URL atau path gambar produk
            $table->string('telepon'); // Nomor telepon pelanggan
            $table->string('kota'); // Kota pelanggan
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
