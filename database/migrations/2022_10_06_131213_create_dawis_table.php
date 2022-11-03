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
            $table->string('nama', 50);
            $table->unsignedBigInteger('role')->default(1); 
            $table->foreign('role')->references('id')->on('struktur_role')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
