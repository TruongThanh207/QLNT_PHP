<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Feedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Feedback', function (Blueprint $table) {
            $table->string('code');
            $table->string('notes');
            $table->integer('status');
            $table->string('registercode');
            $table->foreign('registercode')->references('code')->on('InforRegister')->onDelete('cascade');
            $table->primary('code'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Feedback');
    }
}
