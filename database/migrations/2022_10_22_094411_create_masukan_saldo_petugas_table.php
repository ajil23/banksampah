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
        Schema::create('masukan_saldo_petugas', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_masukan');
            $table->integer('nominal');
            $table->string('struktur', 20);
            $table->unsignedBigInteger('idpetugas');
            $table->foreign('idpetugas')->references('id')->on('petugas')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('masukan_saldo_petugas');
    }
};
