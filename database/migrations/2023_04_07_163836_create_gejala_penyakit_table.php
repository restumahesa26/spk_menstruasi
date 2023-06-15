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
        Schema::create('gejala_penyakit', function (Blueprint $table) {
            $table->id();
            $table->integer('gejala_id')->unsigned();
            $table->integer('penyakit_id')->unsigned();
            $table->float('value_md')->nullable();
            $table->float('value_mb')->nullable();
            $table->float('value_cf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gejala_penyakit');
    }
};
