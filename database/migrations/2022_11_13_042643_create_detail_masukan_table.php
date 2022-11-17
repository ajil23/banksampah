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
        Schema::create('detail_masukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idnasabah');
            $table->foreign('idnasabah')->references('id')->on('nasabah')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idriwayat');
            $table->foreign('idriwayat')->references('kode_id')->on('riwayat')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idsampah');
            $table->foreign('idsampah')->references('id')->on('sampah')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('berat');
            $table->integer('harga_satuan');
            $table->integer('sub_harga');
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
        Schema::dropIfExists('detail_masukan');
    }
};
