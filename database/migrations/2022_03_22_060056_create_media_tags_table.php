<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTagsTable extends Migration
{
    public function up()
    {
        Schema::create('media_tags', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained('media')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_tags');
    }
}
