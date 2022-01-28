<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->foreignId('ministry_id');

            $table->string('entity_name');
            $table->string('entity_code');
            $table->string('invitation_for');
            $table->date('submission_date');
            $table->string('method');
            $table->string('budget');
            $table->string('development_partner');
            $table->string('package_name');

            $table->string('package_no');

            $table->string('programme_name');
            $table->string('programme_code');
            $table->date('publish_date');

            $table->date('last_selling_date');

            $table->dateTime('closing_date');
            $table->dateTime('opening_date');
            $table->longText('principle_selling_document');
            $table->longText('receiving_document');
            $table->longText('opening_document');
            $table->longText('other_selling_document');
            $table->longText('meeting_place')->nullable();
            $table->dateTime('meeting_date')->nullable();
            $table->longText('eligibility');
            $table->longText('description_goods');
            $table->longText('description_related_service')->nullable();
            $table->double('document_price');

            $table->string('lot_no');

            $table->longText('identification');
            $table->longText('location');
            $table->double('security_amount');
            $table->string('completion');
            $table->string('official_inviting_name');
            $table->string('official_inviting_designation');
            $table->longText('official_inviting_address');
            $table->string('official_inviting_contact_phone');
            $table->string('official_inviting_contact_fax');
            $table->string('official_inviting_contact_email')->unique();
//            $table->string('file');

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
        Schema::dropIfExists('tenders');
    }
}
