<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluar_saldo_dawis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_tagihan');
            $table->integer('nominal');
            $table->date('tgl_tempo');
            $table->text('keterangan_keluar');
            $table->unsignedBigInteger('iddawis');
            $table->foreign('iddawis')->references('id')->on('dawis')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('keluar_saldo_dawis');
    }
};
