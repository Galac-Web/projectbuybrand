<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesRequirementsTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->string('name');
            $table->json('items')->nullable();
            $table->string('button_caption')->nullable();
            $table->integer('sort')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_requirements');
    }
}
