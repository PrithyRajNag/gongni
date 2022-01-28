<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_unique_id')->unique();
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
            $table->string('emergency_contact');
            $table->date('dob');
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_name_bn')->nullable();
            $table->longText('present_address');
            $table->longText('permanent_address');
            $table->bigInteger('nid');
            $table->string('cover')->nullable();
//            $table->string('file')->nullable();


            $table->string('designation')->default(0);
            $table->string('job_type');
            $table->date('join_date');
            $table->double('salary')->default(0);

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreignId('ward_id')->nullable();
            $table->foreignId('blood_group_id')->nullable();
//            $table->foreignId('file_id')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
