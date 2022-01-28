<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('category');
            $table->string('area');
            $table->string('name');
            $table->string('title');
            $table->string('details');
            $table->longText('address');
            $table->string('phone_number');
            $table->string('current_status');
            $table->foreignId('ward_id');


            $table->boolean('status')->default(true);
            $table->softDeletes();

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
        Schema::dropIfExists('works');
    }
}
