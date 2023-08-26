<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengumpulanTable extends Migration
{
    public function up()
    {
        Schema::create('detail_pengumpulan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengumpulan_id');
            $table->unsignedBigInteger('muzakki_id');
            $table->unsignedBigInteger('rekening_id');
            $table->string('no_bukti');
            $table->enum('jenis_dana', ['zakat', 'infak/sedekah tidak terikat', 'infak/sedekah terikat', 'dskl', 'csr', 'zakat fitrah']);
            $table->boolean('dalam_neraca');
            $table->decimal('jumlah');
            $table->enum('via', ['offline', 'online']);
            $table->enum('status', ['proses', 'berhasil', 'gagal']);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();

            $table->foreign('pengumpulan_id')->references('id')->on('pengumpulan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_pengumpulan');
    }

}
