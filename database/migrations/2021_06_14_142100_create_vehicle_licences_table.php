<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_licences', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('name');
            $table->string('subCategory_id')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('gender');
            $table->string('owner_name');
            $table->string('phone_number');
            $table->longText('address');
            $table->bigInteger('nid')->nullable();
            $table->bigInteger('licence_number')->unique();

            $table->date('expiry_date');

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
        Schema::dropIfExists('vehicle_licences');
    }
}
