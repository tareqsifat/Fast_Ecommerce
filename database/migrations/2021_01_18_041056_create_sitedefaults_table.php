<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitedefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitedefaults', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('copyright')->nullable();
            $table->longText('sitedescription')->nullable();
            $table->string('menuebackground')->nullable();
            $table->string('bodybackground')->nullable();
            $table->string('email')->nullable();
            $table->string('onsellTime')->nullable();
            $table->string('merchant_onsellTime')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->longText('playstore')->nullable();
            $table->longText('appstore')->nullable();
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
        Schema::dropIfExists('sitedefaults');
    }
}
