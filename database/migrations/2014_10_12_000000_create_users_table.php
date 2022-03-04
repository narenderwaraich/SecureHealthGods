<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_no')->nullable();
            $table->string('avatar')->nullable();
            $table->string('role', 20)->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_token')->nullable();
            $table->string('password');
            $table->string('referral_code')->nullable();
            $table->string('referral_link')->nullable()->unique();
            $table->string('referral_token')->nullable()->unique();
            $table->rememberToken();
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
