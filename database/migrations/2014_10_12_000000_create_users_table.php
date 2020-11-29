<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
            ->references('id')->on('role_accesses')
            ->onDelete('cascade');

            $table->string('fullname')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('sex')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            
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
