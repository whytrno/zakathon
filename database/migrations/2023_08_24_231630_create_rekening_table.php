<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningTable extends Migration
{
    public function up()
    {
        Schema::create('rekenings', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->string('no_rek');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekening');
    }
}
