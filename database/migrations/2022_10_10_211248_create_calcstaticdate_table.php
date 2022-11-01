<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalcstaticdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calcstaticdate', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('element_D')->nullable();
            $table->string('element_e')->nullable();
            $table->string('element_a')->nullable();
            $table->string('element_b')->nullable();
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
        Schema::dropIfExists('calcstaticdate');
    }
}
