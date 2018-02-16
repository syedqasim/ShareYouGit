<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactnoAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function ($table) {
            $table->string('contact_no');
            $table->string('country');
            $table->string('city');
            $table->string('area');
            $table->string('related_area');
            $table->string('street_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function ($table) {
            $table->string('contact_no');
            $table->string('country');
            $table->string('city');
            $table->string('area');
            $table->string('related_area');
            $table->string('street_address');
        });
    }
}
