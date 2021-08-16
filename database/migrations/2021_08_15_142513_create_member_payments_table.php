<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('transaction_id' )->nullable();
            $table->string('bank_transaction_id' )->nullable();
            $table->string('payment_method' )->nullable();
            $table->string('bank_name' )->nullable();
            $table->string('transaction_status')->default('Pending');
            $table->dateTime('transaction_date');
            $table->decimal('amount', 10, 2);
            $table->integer('member_id')->unsigned()->nullable();
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
        Schema::dropIfExists('member_payments');
    }
}
