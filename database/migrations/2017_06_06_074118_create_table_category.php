<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('categories', function(Blueprint $table) {
          $table->increments('id')->unsigned();

          $table->integer('parent_id')->nullable();
          $table->integer('lft')->nullable();
          $table->integer('rgt')->nullable();
          $table->integer('depth')->nullable();
          $table->integer('category_description_id')->unsigned();
          $table->timestamps();
          $table->foreign('category_description_id')->references('id')
             ->on('category_descriptions')
             ->onUpdate('cascade')
             ->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('categories');
    }
}
