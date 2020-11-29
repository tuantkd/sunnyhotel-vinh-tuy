<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookDetailTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_detail_temps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('bookroom_temp_id')->nullable();
            $table->foreign('bookroom_temp_id')
            ->references('id')->on('book_room_temps')
            ->onDelete('cascade');

            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')
            ->references('id')->on('rooms')
            ->onDelete('cascade');


            $table->integer('book_details_total_price')->nullable();
            $table->integer('number_person')->nullable();
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
        Schema::dropIfExists('book_detail_temps');
    }
}
