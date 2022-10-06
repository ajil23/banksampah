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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('sk', 50);
            $table->string('alamat', 100);
            $table->string('no_hp',12);
            $table->year('tgl_berdiri');
            $table->string('ketua',25);
            $table->text('motto',12);
            $table->string('logo', 50);
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
        Schema::dropIfExists('profile');
    }
};
