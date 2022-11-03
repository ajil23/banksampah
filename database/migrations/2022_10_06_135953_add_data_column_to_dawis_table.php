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
        Schema::table('dawis', function (Blueprint $table) {
            $table->string('no_hp', 12);
            $table->string('foto', 50);
            $table->string('tmp_lahir', 50);
            $table->date('tgl_lahir');
            $table->integer('saldo')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dawis', function (Blueprint $table) {
             $table->dropColumn('no_hp');
             $table->dropColumn('foto');
             $table->dropColumn('tmp_lahir');
             $table->dropColumn('tgl_lahir');
        });
    }
};
