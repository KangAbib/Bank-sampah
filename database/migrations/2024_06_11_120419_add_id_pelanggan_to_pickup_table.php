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
        Schema::table('pickup', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pelanggan')->after('id');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pickup', function (Blueprint $table) {
            //
        });
    }
};
