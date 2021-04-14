<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('gender');//0-masculine | 1- feminine | 2- other
            $table->string('profession');
            $table->string('file');
            $table->integer('status'); //0 - inactive | 1 - active
            $table->string('phoneNumber');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');    
            $table->unsignedBigInteger('schooling_id');
            $table->foreign('schooling_id')->references('id')->on('schoolings')->onDelete('cascade');    
            
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
        Schema::dropIfExists('cvs');
    }
}
