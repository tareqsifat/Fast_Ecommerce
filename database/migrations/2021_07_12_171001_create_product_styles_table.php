<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_styles', function (Blueprint $table) {
            $table->id();
            $table->string('card_text')->nullable();
            $table->string('card_button_text_color')->nullable();
            $table->string('card_button_background')->nullable();
            $table->string('card_button_border')->nullable();
            $table->string('card_button_transition')->nullable();
            $table->string('card_button_font_style')->nullable();
            $table->string('card_button_font_weight')->nullable();

            $table->string('card_button_text_hover_color')->nullable();
            $table->string('card_button_hover_background')->nullable();
            $table->string('card_button_hover_border')->nullable();
            $table->string('card_button_hover_font_style')->nullable();
            $table->string('card_button_hover_font_weight')->nullable();
            //wishlis->nullable()t
            $table->string('wishlist_button_text_color')->nullable();
            $table->string('wishlist_button_background')->nullable();
            $table->string('wishlist_button_border')->nullable();
            $table->string('wishlist_button_transition')->nullable();
            $table->string('wishlist_button_hover_text_color')->nullable();
            $table->string('wishlist_button_hover_background')->nullable();
            $table->string('wishlist_button_hover_border')->nullable();
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
        Schema::dropIfExists('product_styles');
    }
}
