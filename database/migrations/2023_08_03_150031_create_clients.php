<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
        $table->id();
            $table->string('new')->nullable();
            $table->string('leadid');
            $table->string('status');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('adress')->nullable(); 
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('otheremail')->nullable();
            $table->string('otherphone')->nullable();
            $table->string('country')->nullable();
            $table->string('nationality')->nullable();
            $table->string('type')->nullable();
            $table->string('comment')->nullable();
            $table->string('role')->default('client');
            $table->string('person_responsible')->nullable();
            $table->string('time_call')->nullable();
            $table->string('extra_detail')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
