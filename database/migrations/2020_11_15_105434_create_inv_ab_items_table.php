<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvAbItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_ab_items', function (Blueprint $table) {
            $table->id();
            $table->string('invnr',20)->default(null)->unique();
            $table->date('andat')->default(null);
            $table->unsignedBigInteger('locid')->nullable();
            $table->float('kp', 8, 2)->nullable();
            $table->string('gart',50)->nullable();
            $table->string('gtyp',50)->nullable();
            $table->string('gname',50)->nullable();
            $table->string('sn',50)->nullable();
            $table->mediumText('notes')->nullable();
            $table->string('path_to_rg',100)->nullable();
            $table->date('ausdat')->nullable();
            $table->mediumText('ausgrund')->nullable();
            $table->timestamps();

            $table->foreign('locid')->references('locid')->on('locations');
            $table->index(['gtyp','gname']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_ab_items');
    }
}
