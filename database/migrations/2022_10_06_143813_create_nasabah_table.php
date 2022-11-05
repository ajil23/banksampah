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
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penduduk_id'); 
            $table->foreign('penduduk_id')->references('id')->on('penduduk')->onDelete('cascade')->onUpdate('cascade');
            $table->string('username');
            $table->string('password');
            $table->string('foto');
            $table->unsignedInteger('saldo')->default(0);
            $table->date('tgl_daftar');
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
        Schema::dropIfExists('nasabah');
    }
};
