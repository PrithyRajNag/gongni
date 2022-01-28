<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_licences', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('enlistment_no');
            $table->string('application_type');
            $table->string('applicant_name');
            $table->string('applicant_constitution');
            $table->date('constitution_date');

            $table->bigInteger('vat_reg_no')->unique();
            $table->bigInteger('tin_no')->unique();
            $table->string('managing_director_name');
            $table->string('gender');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('age');
            $table->string('education_qualification');
            $table->bigInteger('nid');
            $table->string('personal_phone_number');
            $table->string('personal_email');

            $table->longText('business_address_street');
            $table->string('business_address_post_office');

            $table->foreignId('business_address_district_id');

            $table->string('business_address_post_code');
            $table->string('business_phone');
            $table->string('business_email')->unique();

            $table->string('bank_name');
            $table->string('branch');
            $table->bigInteger('account_no');

//            $table->double('fees')->nullable();

            $table->string('technical_employee');
            $table->string('support_staff');
            $table->string('other_staff');

            $table->string('equipment_name')->nullable();
            $table->string('number')->nullable();
            $table->string('year')->nullable();
            $table->string('condition')->nullable();

            $table->string('financial_source');
            $table->string('amount');
            $table->string('debarred');
            $table->string('debarred_reason')->nullable();

            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();

            $table->foreignId('subCategory_id')->nullable();

            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();


        });
    }


    public function down()
    {
        Schema::dropIfExists('contractor_licences');
    }
}
