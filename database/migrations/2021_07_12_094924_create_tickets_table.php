<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('submitter');
        $table->tinyInteger('priority_id')->default(2);
        $table->string('tel_number');
        $table->string('custom_tel_number')->nullable();
        $table->string('problem_type');
        $table->integer('gname_id')->nullable();
        $table->string('searchsoftware')->nullable();
        $table->string('software_name')->nullable();
        $table->string('software_reason')->nullable();
        $table->text('notizen')->nullable();
        $table->string('keyboard')->nullable();
        $table->string('mouse')->nullable();
        $table->string('speaker')->nullable();
        $table->string('headset')->nullable();
        $table->string('webcam')->nullable();
        $table->string('monitor')->nullable();
        $table->string('other')->nullable();
        $table->string('geht_nicht_an')->nullable();
        $table->string('blue')->nullable();
        $table->string('black')->nullable();
        $table->string('slow_computer')->nullable();
        $table->string('web_cam_problem')->nullable();
        $table->string('head_set_problem')->nullable();
        $table->string('lautsprecher_mal')->nullable();
        $table->string('keyboard_malfunction')->nullable();
        $table->string('mouse_mal')->nullable();
        $table->string('slow_network')->nullable();
        $table->string('no_network_drive')->nullable();
        $table->string('laud_fan')->nullable();
        $table->integer('location_id')->nullable();
        $table->integer('room_id')->nullable();
        $table->integer('printer_name')->nullable();
        $table->string('assignedTo')->nullable();
        $table->timestamps();
        $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
