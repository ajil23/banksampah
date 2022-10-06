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
            // foreign key idnasabah
            // foreign key id dawis
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
