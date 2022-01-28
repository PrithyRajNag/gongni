<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('institution_category');
            $table->string('institution_type');
            $table->string('name');
            $table->string('code');
            $table->string('principle_name');
            $table->longtext('address');
            $table->string('phone_number');
            $table->longText('details')->nullable();
            $table->decimal('longitude', 11,8)->nullable();
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
        Schema::dropIfExists('education_institutions');
    }
}
