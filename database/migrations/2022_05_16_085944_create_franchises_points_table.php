<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesPointsTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('cascade');
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->integer('own_points')->default(0)->comment('Собственные точки');
            $table->integer('franchise_points')->default(0)->comment('Франчайзинговые точки');
            $table->integer('repeat_points')->nullable()->comment('Повторные точки');
            $table->string('geo_lat')->nullable();
            $table->string('geo_lon')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_points');
    }
}
