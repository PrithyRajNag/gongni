<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorLicenceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_licence_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('contractor_id');

            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('flag');
            $table->foreignId('fees_id');

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
        Schema::dropIfExists('contractor_licence_histories');
    }
}
