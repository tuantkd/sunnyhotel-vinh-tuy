<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookRoomTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_room_temps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('bookroom_date_received')->nullable();
            $table->date('bookroom_date_pay')->nullable();
            $table->integer('bookroom_number_person')->nullable();
            $table->integer('bookroom_number_room')->nullable();
            $table->integer('bookroom_deposit_money')->nullable();

            $table->string('fullname_customer')->nullable();
            $table->integer('phone_customer')->nullable();
            $table->string('address_customer')->nullable();

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
        Schema::dropIfExists('book_room_temps');
    }
}
