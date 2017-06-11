<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products' , function (Blueprint $table){
           $table->increments('id');
           $table->string('name');
           $table->text('description')->nullable();
           $table->string('url')->nullable();
           $table->string('price' );
           $table->string('image');
           $table->integer('category_id');
           $table->integer('option_id')->unsigned()->nullable();
           $table->foreign('option_id')
              ->references('id')->on('product_options')
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
        //
    }
}
