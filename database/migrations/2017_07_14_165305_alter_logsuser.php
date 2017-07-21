<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLogsuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logsuser', function (Blueprint $table) {
            $table->string('description_info')->after('id_affected_user');
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
            $table->dropColumn('description_info');
        });
    }
}
