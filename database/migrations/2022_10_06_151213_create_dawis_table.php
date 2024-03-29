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
        Schema::create('dawis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->unsignedBigInteger('nasabah_id'); 
            $table->foreign('nasabah_id')->references('id')->on('nasabah')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jadwal');
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
        Schema::dropIfExists('dawis');
    }
};
