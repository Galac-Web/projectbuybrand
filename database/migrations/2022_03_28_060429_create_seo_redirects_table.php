<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoRedirectsTable extends Migration
{
    public function up()
    {
        Schema::create('seo_redirects', function (Blueprint $table) {
            $table->id();
            $table->string('old');
            $table->morphs('newable');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo_redirects');
    }
}
