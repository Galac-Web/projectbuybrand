<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesSupportsTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('franchises_supports_groups')->onDelete('cascade');
            $table->string('name');
            $table->integer('sort')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_supports');
    }
}
