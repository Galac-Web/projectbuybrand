<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontur', function (Blueprint $table) {
            $table->id();
            $table->string('public')->nullable();
            $table->string('regData')->nullable();
            $table->string('regtradmark')->nullable();
            $table->string('lawsuits')->nullable();
            $table->integer('anakitikcount')->nullable();
            $table->integer('anakitikcountNote')->nullable();
            $table->integer('anakitikcountWin')->nullable();
            $table->integer('anakitikcountLose')->nullable();
            $table->integer('anakitikexec')->nullable();
            $table->integer('franchise_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontur');
    }
}
