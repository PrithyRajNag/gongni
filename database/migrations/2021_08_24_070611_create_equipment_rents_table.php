<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_rents', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('equipment_name');
            $table->string('equipment_number');
            $table->string('rental_period');
            $table->double('rental_cost');
            $table->double('total')->nullable();
            $table->string('category');
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');

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
        Schema::dropIfExists('equipment_rents');
    }
}
