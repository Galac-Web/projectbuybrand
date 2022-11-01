<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoutnratingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises_coutnrating', function (Blueprint $table) {
            $table->id();
            $table->float('startData')->nullable();
            $table->float('initData')->nullable();
            $table->float('investition')->nullable();
            $table->float('payback')->nullable();
            $table->float('region')->nullable();
            $table->float('couttokinreg')->nullable();
            $table->float('couttokin')->nullable();
            $table->integer('franchise_id');
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
        Schema::dropIfExists('coutnrating');
    }
}
