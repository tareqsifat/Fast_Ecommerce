<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('brithdate')->nullable();
            $table->string('gander')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('adress')->nullable();
            $table->string('present_address')->nullable();
            $table->longText('description')->nullable();
            $table->string('nid')->nullable();
            $table->string('tid')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avater')->nullable();
            $table->integer('user_role')->default(0);
            $table->string('user_as')->default('user'); //admin, user, merchent
            $table->string('delevery_system')->default(' '); //cash_on
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('verify_status')->default(0);
            $table->boolean('notification')->default(0);
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
        Schema::dropIfExists('users');
    }
}
