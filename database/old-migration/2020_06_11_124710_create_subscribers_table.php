<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gender')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('state', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('zipcode', 100)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('left_amount', 10, 2)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('account_no', 255)->nullable();
            $table->string('ifsc_code', 255)->nullable();
            $table->string('upi_id', 255)->nullable();
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'subscribers_user_id_idx');
            $table->foreign('user_id', 'subscribers_user_id_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
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
        Schema::dropIfExists('subscribers');
    }
}
