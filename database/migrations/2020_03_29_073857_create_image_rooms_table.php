<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')
            ->references('id')->on('rooms')
            ->onDelete('cascade');

            $table->string('room_image')->nullable();
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
        Schema::dropIfExists('image_rooms');
    }
}
