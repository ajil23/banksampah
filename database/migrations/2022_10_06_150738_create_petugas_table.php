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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('tugas', 25);
            $table->unsignedBigInteger('role')->default(3);
            $table->foreign('role')->references('id')->on('struktur_role')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_hp', 12);
            $table->string('foto', 50);
            $table->string('tmp_lahir', 50);
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('petugas');
    }
};
