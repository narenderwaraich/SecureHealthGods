<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->text('message');
            $table->text('reply_message')->nullable();
            $table->string('status')->default('Pending');
            $table->integer('merchant_id')->unsigned();
            $table->index(["merchant_id"], 'contacts_merchant_id_idx');
            $table->foreign('merchant_id', 'contacts_merchant_id_idx')
                ->references('id')->on('merchant_accounts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('contacts');
    }
}
