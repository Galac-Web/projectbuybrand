<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');
            $table->integer('views')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
