<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMoveItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_move_items', function (Blueprint $table) {
            $table->id();
            $table->string('gname',50)->nullable();
            $table->foreignId('room_id')->nullable();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('inv_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_move_items');
    }
}