<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersSocialsTable extends Migration
{
    public function up()
    {
        Schema::create('users_socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('email')->nullable();
            $table->string('social_id')->nullable();
            $table->string('driver');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_socials');
    }
}
