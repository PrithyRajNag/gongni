<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreetLampsTable extends Migration
{

    public function up()
    {
        Schema::create('street_lamps', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('lamp_name');
            $table->string('details');
            $table->string('area');
            $table->string('installation_date');
            $table->string('road');
            $table->string('category');
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('street_lamps');
    }
}
