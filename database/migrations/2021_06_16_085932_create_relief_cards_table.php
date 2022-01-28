<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReliefCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relief_cards', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('card_number')->unique();
            $table->boolean('status')->default(true);

            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('ward_id');
            $table->foreignId('people_id');
            $table->foreignId('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relief_cards');
    }
}
