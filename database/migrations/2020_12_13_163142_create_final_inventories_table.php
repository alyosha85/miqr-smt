<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('invr')->nullable();
            $table->string('gname')->nullable();
            $table->string('place')->nullable();
            $table->string('address')->nullable();
            $table->string('room')->nullable();
            $table->boolean('zuordnen')->nullable()->default(0);
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
        Schema::dropIfExists('final_inventories');
    }
}
