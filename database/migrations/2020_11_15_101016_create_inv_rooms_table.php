<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_rooms', function (Blueprint $table) {
            $table->bigIncrements('rid');
            $table->unsignedBigInteger('pid')->nullable();
            $table->unsignedBigInteger('locid')->nullable();
            $table->integer('etage')->default(0)->nullable();
            $table->string('rname',50)->nullable();
            $table->string('altrname',50)->nullable();
            $table->timestamps();

            $table->foreign('pid')->references('pid')->on('places');
            $table->foreign('locid')->references('locid')->on('locations');
            $table->index(['rname']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_rooms');
    }
}
