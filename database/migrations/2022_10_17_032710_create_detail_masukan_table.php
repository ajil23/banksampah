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
            $table->date('tgl_masukan');
            $table->integer('nominal');
            $table->unsignedBigInteger('idnasabah');
            $table->foreign('idnasabah')->references('id')->on('nasabah')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('detail_masukan');
    }
};
