<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('background_color')->nullable();
            $table->string('background_hover_color')->nullable();
            $table->string('color')->nullable();
            $table->string('hover_color')->nullable();
            $table->string('status')->nullable();
            $table->string('style_for');
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
        Schema::dropIfExists('themes_settings');
    }
}
