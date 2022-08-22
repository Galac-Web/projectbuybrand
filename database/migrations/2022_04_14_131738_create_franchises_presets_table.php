<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesPresetsTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_presets', function (Blueprint $table) {
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->foreignId('preset_id')->constrained('presets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_presets');
    }
}
