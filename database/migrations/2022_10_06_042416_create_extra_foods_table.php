<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_foods', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('food_id');
            $table->string('title')->unique();
            $table->integer('quantity');
            $table->integer('unitPrice');
            $table->string('image');

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
        Schema::dropIfExists('extra_foods');
    }
}
