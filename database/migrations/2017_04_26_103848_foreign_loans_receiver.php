<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignLoansReceiver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->integer('id_receiver')->unsigned();
            $table->foreign('id_receiver')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropForeign(['id_receiver']);
            $table->dropColumn('id_receiver');
        });
    }
}
