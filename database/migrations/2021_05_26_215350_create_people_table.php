<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('first_name');
            $table->string('first_name_bn');
            $table->string('last_name');
            $table->string('last_name_bn');
            $table->string('father_name');
            $table->string('father_name_bn');
            $table->string('mother_name');
            $table->string('mother_name_bn');
            $table->string('gender');
            $table->string('phone_number');
            $table->date('dob');
            $table->string('occupation');
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_name_bn')->nullable();
            $table->longText('present_address');
            $table->longText('permanent_address');
            $table->bigInteger('nid')->nullable();
            $table->bigInteger('birth_reg');
            $table->string('cover')->nullable();


            $table->boolean('is_alive')->default(true);
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('ward_id');
            $table->foreignId('blood_group_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
