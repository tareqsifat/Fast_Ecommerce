<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->longText('orderId')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('discount')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('tax')->nullable();
            $table->string('quantity')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_by')->nullable();
            $table->longText('address')->nullable();
            $table->longText('divisions')->nullable();
            $table->longText('district')->nullable();
            $table->longText('upazila')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('orderfor')->default('normal'); //normal, shipping
            $table->integer('status')->default(0); 
            $table->boolean('notification')->default(0);
            $table->boolean('customernotification')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
