<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengumpulanTable extends Migration
{
    public function up()
    {
        Schema::create('pengumpulan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengumpulan_id');
            $table->unsignedBigInteger('muzakki_id');
            $table->unsignedBigInteger('rekening_id');
            $table->string('no_pengumpulan');
            $table->enum('jenis_dana', ['zakat', 'infak/sedekah tidak terikat', 'infak/sedekah terikat', 'dskl', 'csr', 'zakat fitrah']);
            $table->boolean('dalam_neraca');
            $table->string('jumlah');
            $table->enum('via', ['offline', 'online']);
            $table->enum('status', ['proses', 'berhasil', 'gagal']);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();

            $table->foreign('pengumpulan_id')->references('id')->on('pengumpulans');
            $table->foreign('muzakki_id')->references('id')->on('muzakkis');
            $table->foreign('rekening_id')->references('id')->on('rekenings');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_pengumpulan');
    }

}
