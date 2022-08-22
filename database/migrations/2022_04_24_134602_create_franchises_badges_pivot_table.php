<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesBadgesPivotTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_badges_pivot', function (Blueprint $table) {
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->foreignId('franchise_badge_id')->constrained('franchises_badges')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_badges_pivot');
    }
}
