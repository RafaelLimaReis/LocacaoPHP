<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitedHasReserve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inviteds_has_reserve', function (Blueprint $table) {
            $table->integer('id_invited')->unsigned();
            $table->foreign('id_invited')->references('id')->on('inviteds');
            $table->integer('id_reserve')->unsigned();
            $table->foreign('id_reserve')->references('id')->on('reserves');
            $table->primary(['id_invited','id_reserve']);
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
        Schema::drop('inviteds_has_reserve');
    }
}
