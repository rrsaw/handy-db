<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('items', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->text('description')->nullable();
           $table->binary('images');
           $table->decimal('price', 5, 2);
           $table->date('start_date');
           $table->date('end_date');
           $table->boolean('status');
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
         Schema::dropIfExists('items');
     }
}
