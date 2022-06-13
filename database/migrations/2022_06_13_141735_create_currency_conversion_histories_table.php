<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyConversionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_conversion_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->integer('amount');
            $table->string('from');
            $table->string('to');
            $table->string('conversion_rate');
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
        Schema::dropIfExists('currency_conversion_histories');
    }
}
