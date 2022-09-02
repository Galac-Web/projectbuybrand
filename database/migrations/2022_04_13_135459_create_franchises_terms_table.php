<?php

use App\Enums\RoyaltyType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFranchisesTermsTable extends Migration
{
    public function up()
    {
        Schema::create('franchises_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('franchise_id')->constrained('franchises')->onDelete('cascade');
            $table->enum('royalty_type', RoyaltyType::getValues())->comment('Вид роялти');
            $table->string('royalty')->nullable()->comment('Роялти');
            $table->between('investments', fn ($column) => $table->decimal($column, 12, 0)->nullable()->comment('Инвестиции'));
            $table->between('lumpsum', fn ($column) => $table->decimal($column, 12, 0)->nullable()->comment('Паушальный взнос'));
            $table->between('staff', fn ($column) => $table->integer($column)->nullable()->comment('Требуемый персонал'));
            $table->between('payback', fn ($column) => $table->integer($column)->nullable()->comment('Срок окупаемости'));
            $table->decimal('avg_monthly_revenue', 12, 0)->nullable()->comment('Среднемесячная выручка');
            $table->decimal('profit', 12, 0)->nullable()->comment('Доходность');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises_terms');
    }
}
