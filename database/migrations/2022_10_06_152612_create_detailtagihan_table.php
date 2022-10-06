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
        Schema::create('detailtagihan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_tagihan');
            $table->integer('nominal');
            $table->date('tgl_tempo');
            $table->unsignedBigInteger('nasabah_id')->required();
            $table->foreign('nasabah_id')->references('id')->on('nasabah');              // foreign key idnasabah
            $table->unsignedBigInteger('dawis_id')->required();
            $table->foreign('dawis_id')->references('id')->on('dawis');              // foreign key id dawis
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
        Schema::dropIfExists('detailtagihan');
    }
};
