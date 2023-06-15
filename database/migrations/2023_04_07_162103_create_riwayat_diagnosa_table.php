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
        Schema::create('riwayat_diagnosa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('usia');
            $table->text('hasil_diagnosa');
            $table->text('cf_max');
            $table->text('gejala_terpilih');
            $table->string('file_pdf')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_diagnosa');
    }
};
