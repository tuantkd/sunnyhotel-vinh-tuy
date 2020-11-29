<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_stars', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade');

            $table->double('number_star')->nullable();

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
        Schema::dropIfExists('rating_stars');
    }
}
