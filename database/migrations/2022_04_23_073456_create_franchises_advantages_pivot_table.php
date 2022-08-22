<?php

use App\Enums\FranchiseAdvantageType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesAdvantagesPivotTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_advantages_pivot', function (Blueprint $table) {
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->foreignId('franchise_advantage_id')->constrained('franchises_advantages')->onDelete('cascade');
            $table->enum('type', FranchiseAdvantageType::getValues());
            $table->string('label')->nullable();
            $table->boolean('is_main')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_advantages_pivot');
    }
}
