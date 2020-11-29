<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_services', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')
            ->references('id')->on('services')
            ->onDelete('cascade');

            $table->string('service_image')->nullable();
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
        Schema::dropIfExists('image_services');
    }
}
