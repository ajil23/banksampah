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
        Schema::table('nasabah', function (Blueprint $table) {
            $table->unsignedBigInteger('dawis_id')->nullable();
            $table->foreign('dawis_id')->references('id')->on('dawis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nasabah', function (Blueprint $table) {
            //
        });
    }
};
