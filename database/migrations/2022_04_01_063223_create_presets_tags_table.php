<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresetsTagsTable extends Migration
{
    public function up()
    {
        Schema::create('presets_tags', function (Blueprint $table) {
            $table->foreignId('preset_id')->constrained('presets')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presets_tags');
    }
}
