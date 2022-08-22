<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesCategoriesTable extends Migration
{
    /** @var string */
    private $table = 'franchises_categories';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained($this->table)->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->integer('sort')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
