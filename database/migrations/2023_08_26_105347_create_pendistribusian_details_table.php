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
        Schema::create('pendistribusian_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendistribusian_id');
            $table->unsignedBigInteger('mustahiq_id');
            $table->string('no_pendistribusian');
            $table->enum('jenis_bantuan', ['konsumtif', 'produktif']);
            $table->string('jumlah');
            $table->enum('via', ['online', 'offline']);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();

            $table->foreign('pendistribusian_id')->references('id')->on('pendistribusians');
            $table->foreign('mustahiq_id')->references('id')->on('mustahiqs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendistribusian_details');
    }
};