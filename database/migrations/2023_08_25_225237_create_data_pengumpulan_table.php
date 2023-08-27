<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPengumpulanTable extends Migration
{
    public function up()
    {
        Schema::create('pengumpulans', function (Blueprint $table) {
            $table->id();
            $table->integer('bulan');
            $table->integer('tahun');
            $table->string('target_zakat');
            $table->string('target_infak');
            $table->string('target_csr');
            $table->string('target_dskl');
            $table->enum('status', ['belum diajukan', 'diajukan', 'revisi', 'disetujui'])->default('belum diajukan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengumpulan');
    }
}
