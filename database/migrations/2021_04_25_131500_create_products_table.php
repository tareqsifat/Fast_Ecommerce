<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('product_code');
            $table->string('product_for')->default('fast_deals'); //campaign, fast_deals, shipping
            $table->string('shipping')->nullable(); //shipping
            $table->string('color')->nullable(); //shipping
            $table->bigInteger('sold')->nullable(); //shipping
            $table->string('impacode')->nullable(); //shipping
            $table->string('shop_for')->default('Fast Deals'); //Merchant  Fast deals
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('sub_sub_category_id')->nullable();
            $table->longText('thumbnail')->nullable();
            $table->integer('mostview')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description2')->nullable();
            $table->boolean('availability')->default(0);
            $table->integer('quantity')->default(1);
            $table->float('price')->nullable();
            $table->float('sale_price')->nullable();
            $table->timestamp('offer_time')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
