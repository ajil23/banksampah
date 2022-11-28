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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_id');
            $table->primary('kode_id');
            $table->unsignedBigInteger('nasabah_id');
            $table->foreign('nasabah_id')->references('id')->on('nasabah')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('petugas_id');
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('dawis_id');
            $table->foreign('dawis_id')->references('id')->on('dawis')->onDelete('cascade')->onUpdate('cascade');
            $table->text('keterangan_masuk');
            $table->integer('nominal');
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
        Schema::dropIfExists('riwayat');
    }
};
