<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')->on('categoryrooms')
            ->onDelete('cascade');


            $table->string('room_name')->nullable();
            $table->string('room_image')->nullable();
            $table->integer('room_price')->nullable();
            $table->text('room_describe')->nullable();
            $table->text('room_status')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
