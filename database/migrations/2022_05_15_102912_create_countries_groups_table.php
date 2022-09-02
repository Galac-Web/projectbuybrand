<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('countries_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('sort')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries_groups');
    }
}
