<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('payment_method')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->string('bank_name')->nullable();  
            $table->string('transaction_status');
            $table->string('bank_transaction_id')->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->integer('youtube_get_id')->unsigned();
            $table->index(['youtube_get_id'], 'payments_youtube_get_id_idx');
            $table->foreign('youtube_get_id', 'payments_youtube_get_id_idx')
                ->references('id')->on('youtube_gets')
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
        Schema::dropIfExists('payments');
    }
}
