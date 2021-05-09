<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique(); 
            $table->string('position')->nullable(); 
            $table->string('abteilung')->nullable(); 
            $table->string('plz')->nullable(); 
            $table->string('bundesland')->nullable(); 
            $table->string('straße')->nullable(); 
            $table->string('tel')->nullable(); 
            $table->string('mobil')->nullable(); 
            $table->string('email')->unique();
            $table->string('guid')->unique()->nullable();
            $table->string('domain')->nullable();
            $table->string('password');
            $table->text('roles_name')->default('Verwaltung');
            $table->string('status',9)->default('Inactive');
            $table->tinyInteger('replikation')->default(0);
            $table->date('lastlogin')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
