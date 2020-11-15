<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempInvAbItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_inv_ab_items', function (Blueprint $table) {
            $table->integer('locid')->nullable();
            $table->integer('lfd_num')->nullable();
            $table->string('invnr',50)->nullable();
            $table->string('rname',50)->nullable();
            $table->string('gname',50)->nullable();
            $table->string('gart',50)->nullable();
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
        Schema::dropIfExists('temp_inv_ab_items');
    }
}
