<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPersonsTable extends Migration
{
    public function up()
    {
        Schema::create('media_persons', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained('media')->onDelete('cascade');
            $table->foreignId('person_id')->constrained('persons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_persons');
    }
}
