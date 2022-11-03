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
            $table->string('nama', 50);
            $table->unsignedBigInteger('role')->default(2);
            $table->foreign('role')->references('id')->on('struktur_role')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_hp', 12);
            $table->string('foto', 50);
            $table->date('tgl_join');
            $table->date('tgl_lahir');
            $table->unsignedBigInteger('iddawis');
            $table->foreign('iddawis')->references('id')->on('dawis')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
