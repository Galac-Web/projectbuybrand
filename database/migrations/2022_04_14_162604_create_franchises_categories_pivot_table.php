<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesCategoriesPivotTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_categories_pivot', function (Blueprint $table) {
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->foreignId('franchise_category_id')->constrained('franchises_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_categories_pivot');
    }
}
