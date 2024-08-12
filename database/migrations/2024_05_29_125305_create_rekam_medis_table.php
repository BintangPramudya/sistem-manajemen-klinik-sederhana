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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm');
            $table->foreignId('pasien_id')->constrained('pasiens');
            $table->foreignId('lab_id')->constrained('labs');
            $table->foreignId('obat_id')->constrained('obats');
            $table->foreignId('dokter_id')->constrained('dokters');
            $table->text('diagnosa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
