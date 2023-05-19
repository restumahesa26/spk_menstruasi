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
        Schema::create('rule_penyakit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gejala_id')->references('id')->on('gejala');
            $table->foreignId('penyakit_id')->references('id')->on('penyakit');
            $table->double('nilai_cf', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule_penyakit');
    }
};
