<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesBadgesTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_badges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_badges');
    }
}
