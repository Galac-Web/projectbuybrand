<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesTable extends Migration
{
    public function up()
    {
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('franchises_types')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(0);
            $table->year('foundation_year')->comment('Год основания');
            $table->year('start_year')->comment('Год запуска');
            // TODO REMOVE
            $table->string('region_start')->nullable()->comment('Регион запуска');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises');
    }
}
