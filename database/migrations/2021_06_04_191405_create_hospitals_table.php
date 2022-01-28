<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{

    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('hospital_type');

            $table->string('name');
            $table->longtext('address');
            $table->string('phone_number');
            $table->string('owner_name');
            $table->longText('details')->nullable();
            $table->decimal('longitude' , 11,8)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();

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
        Schema::dropIfExists('hospitals');
    }
}
