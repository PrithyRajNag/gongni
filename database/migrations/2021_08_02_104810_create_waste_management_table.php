<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasteManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waste_management', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->foreignId('ward_id');

            $table->string('name');
            $table->string('phone_number');
            $table->string('contractual_period');
            $table->string('job_type');
            $table->date('join_date');
            $table->double('salary');
            $table->string('file')->nullable();

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
        Schema::dropIfExists('waste_management');
    }
}
