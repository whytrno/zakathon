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
        Schema::create('donasi_donaturs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donasi_id');
            $table->unsignedBigInteger('donatur_id');
            $table->string('no_donasi')->unique();
            $table->string('jumlah');
            $table->enum('status', ['proses', 'berhasil', 'gagal']);
            $table->timestamps();

            $table->foreign('donasi_id')->references('id')->on('donasis');
            $table->foreign('donatur_id')->references('id')->on('donaturs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi_donaturs');
    }
};
