<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('reciever_id');
    $table->foreign('reciever_id')->references('id')->on('users')->onDelete('cascade');
     $table->unsignedBigInteger('sender_id');
    $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
    $table->string('message');
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
        Schema::dropIfExists('messages');
    }
}
