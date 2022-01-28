<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReliefCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('relief_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('name');
            $table->string('type');


            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('relief_categories');
    }
}
