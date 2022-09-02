<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('countries_groups')->onDelete('cascade');
            $table->string('name');
            $table->string('capital')->nullable();
            $table->string('geo_lat')->nullable();
            $table->string('geo_lon')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
