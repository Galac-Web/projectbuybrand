<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesSupportsPivotTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_supports_pivot', function (Blueprint $table) {
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->foreignId('franchise_support_id')->constrained('franchises_supports')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_supports_pivot');
    }
}
