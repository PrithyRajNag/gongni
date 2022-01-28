<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLicencesTable extends Migration
{

    public function up()
    {
        Schema::create('trade_licences', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('serial');

            $table->string('business_name');
            $table->string('business_name_bn');
            $table->longText('business_details');
            $table->string('shop_holding_no');
            $table->string('shop_holding_no_bn');
            $table->longText('address');
            $table->longText('address_bn');
            $table->string( 'road');
            $table->string( 'road_bn');
            $table->longText('area');
            $table->longText('area_bn');
            $table->longText('market_name')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('shop_no')->nullable();
            $table->date('business_start_date');
            $table->string('business_nature');
            $table->string('authorised_capital');
            $table->string('paidUp_capital');
            $table->string('is_factory');
            $table->string('is_chemical_available');
            $table->string('plot_type');
            $table->string('plot_category');
            $table->string('place');
            $table->string('activity');
            $table->string('licence_number')->unique();
            $table->string('issue_date')->nullable();
            $table->string('expiry_date')->nullable();

//            $table->string('previous_licence_number')->unique()->nullable();

            $table->string('name');
            $table->string('name_bn');
            $table->string('father_name');
            $table->string('father_name_bn');
            $table->string('mother_name');
            $table->string('mother_name_bn');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_name_bn')->nullable();
            $table->date('dob');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('bin')->unique();
            $table->bigInteger('nid');
            $table->bigInteger('passport_no')->nullable();
            $table->bigInteger('birth_reg');
            $table->string('photo')->nullable();

            $table->longText('present_address');
            $table->longText('present_address_bn');
            $table->string('present_holding_no');
            $table->string('present_holding_no_bn');
            $table->string('present_address_area');
            $table->string('present_address_area_bn');
            $table->string('present_post_code');
            $table->string('present_post_code_bn');

            $table->foreignId('present_division_id');
            $table->foreignId('present_district_id');
            $table->foreignId('present_thana_id');

            $table->longText('permanent_address');
            $table->longText('permanent_address_bn');
            $table->string('permanent_holding_no');
            $table->string('permanent_holding_no_bn');
            $table->string('permanent_address_area');
            $table->string('permanent_address_area_bn');
            $table->string('permanent_post_code');
            $table->string('permanent_post_code_bn');

            $table->foreignId('permanent_division_id');
            $table->foreignId('permanent_district_id');
            $table->foreignId('permanent_thana_id');

            $table->foreignId('ward_id');
            $table->foreignId('sub_category_id')->nullable();

            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('trade_licences');
    }
}
