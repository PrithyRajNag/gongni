<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicToiletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_toilets', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('public_toilet_number');
            $table->string('name');
            $table->string('maintain_people_name');
            $table->string('phone_number');
            $table->longtext('address');
            $table->longText('details')->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
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
        Schema::dropIfExists('public_toilets');
    }
}
