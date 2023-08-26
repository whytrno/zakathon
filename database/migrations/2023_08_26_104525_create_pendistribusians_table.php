<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendistribusians', function (Blueprint $table) {
            $table->id();
            $table->string('program');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->string('target_fakir');
            $table->string('target_miskin');
            $table->string('target_amil');
            $table->string('target_muallaf');
            $table->string('target_riqob');
            $table->string('target_gharim');
            $table->string('target_fisabilillah');
            $table->string('target_ibnu_sabil');
            $table->enum('status', ['belum diajukan', 'diajukan', 'revisi', 'disetujui'])->default('belum diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendistribusians');
    }
};
