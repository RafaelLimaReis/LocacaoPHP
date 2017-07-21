<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLogsuser2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logsuser', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_affected_user']);
            $table->dropColumn(['id_user', 'id_affected_user']);
            $table->longtext('description_info')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logsuser', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_affected_user')->unsigned();
            $table->foreign('id_affected_user')->references('id')->on('users');
            $table->string('description_info')->change();
        });
    }
}
