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
        Schema::table('detailtagihan', function (Blueprint $table) {
            $table->renameColumn('tgl_tempo', 'tgl_bayar');
            $table->unsignedBigInteger('idsampah')->after('idnasabah');
            $table->foreign('idsampah')->references('id')->on('sampah')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detailtagihan', function (Blueprint $table) {
            $table->renameColumn('tgl_tempo', 'tgl_bayar');
        });
    }
};
