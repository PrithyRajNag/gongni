<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLicenceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_licence_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trade_id');

            $table->string('licence_type');
            $table->string('licence_number');
            $table->string('issue_date');
            $table->string('expiry_date');
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
        Schema::dropIfExists('trade_licence_histories');
    }
}
