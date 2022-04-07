<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanerSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baner_slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading')->nullable(); 
            $table->string('sub_heading')->nullable(); 
            $table->string('button_text')->nullable(); 
            $table->string('button_link')->nullable(); 
            $table->string('page_name')->nullable(); 
            $table->string('image')->nullable(); 
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
        Schema::dropIfExists('baner_slides');
    }
}
