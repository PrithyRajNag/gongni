<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketsTable extends Migration
{

    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('name');
            $table->integer('number');
            $table->longText('area');
            $table->integer('total_shop');
            $table->longText('details')->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('latitude', 10 , 8)->nullable();

            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('ward_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markets');
    }
}
