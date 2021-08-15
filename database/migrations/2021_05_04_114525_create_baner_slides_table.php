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
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('heading', 255)->nullable();
            $table->string('sub_heading', 255)->nullable();
            $table->string('button_text', 100)->nullable();
            $table->string('button_link', 255)->nullable();
            $table->string('page_name', 100)->nullable();
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
