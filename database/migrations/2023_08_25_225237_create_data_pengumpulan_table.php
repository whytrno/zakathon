<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPengumpulanTable extends Migration
{
    public function up()
    {
        Schema::create('pengumpulan', function (Blueprint $table) {
            $table->id();
            $table->enum('bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->integer('tahun');
            $table->integer('target_zakat');
            $table->integer('target_infak');
            $table->integer('target_csr');
            $table->integer('target_dskl');
            $table->enum('status', ['belum diajukan', 'diajukan', 'revisi', 'disetujui']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengumpulan');
    }
}
