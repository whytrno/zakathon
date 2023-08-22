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
        Schema::create('mustahiqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nim')->unique();
            $table->enum('jenis', ['perorangan', 'kelompok']);
            $table->integer('jumlah_anggota')->nullable();
            $table->string('pemilik_rekening');
            $table->enum('bank', ['BCA', 'BRI', 'Mandiri', 'BSI']);
            $table->string('no_rek')->unique();
            $table->enum('asnaf', ['fakir', 'miskin', 'amil', 'mualaf', 'riqob', 'gharim', 'fisabilillah', 'ibnu sabil']);
            $table->enum('pekerjaan', ['wirausaha', 'mahasiswa', 'karyawan', 'buruh']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahiqs');
    }
};