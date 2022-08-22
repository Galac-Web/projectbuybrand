<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesFormatsTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_formats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->between('investments', fn ($column) => $table->decimal($column, 12, 0)->nullable()->comment('Инвестиции'));
            $table->integer('payback_period')->nullable()->comment('Срок окупаемости');
            $table->integer('floor_space')->nullable()->comment('Размер помещений');
            $table->integer('staff')->nullable()->comment('Персонал');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_formats');
    }
}
