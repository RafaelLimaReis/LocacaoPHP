<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPartialTableReserves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reserves', function (Blueprint $table) {
            $table->dropForeign(['id_inicio']);
            $table->dropForeign(['id_fim']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserves', function (Blueprint $table) {
            $table->foreign('id_inicio')->references('id')->on('schedules');
            $table->foreign('id_fim')->references('id')->on('schedules');
        });
    }
}
