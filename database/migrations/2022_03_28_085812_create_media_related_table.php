<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaRelatedTable extends Migration
{
    public function up()
    {
        Schema::create('media_related', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained('media')->onDelete('cascade');
            $table->foreignId('related_id')->constrained('media')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_related');
    }
}
