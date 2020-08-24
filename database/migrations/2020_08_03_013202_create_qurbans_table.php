<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQurbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qurbans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis', 255);
            $table->unsignedInteger('harga');
            $table->unsignedSmallInteger('tahun');
            $table->unsignedSmallInteger('lama');
            $table->unsignedInteger('besar_angsuran');
            $table->unsignedSmallInteger('interval_angsuran');
            $table->date('tgl_angsuran_pertama');
            $table->unsignedSmallInteger('max_pequrban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
        Schema::dropIfExists('qurbans');
    }
}
