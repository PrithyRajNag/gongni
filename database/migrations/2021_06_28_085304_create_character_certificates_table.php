<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_certificates', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('serial')->unique();
            $table->date('issue_date');
            $table->boolean('status')->default(true);

            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('people_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_certificates');
    }
}
