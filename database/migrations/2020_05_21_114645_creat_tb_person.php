<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatTbPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Persons', function (Blueprint $table) {
            $table->string('code');
            $table->string('name');
            $table->string('gioitinh');
            $table->integer('phone');
            $table->string('state');
            $table->integer('vehicle');
            $table->string('registercode');
            $table->primary('code');
            $table->foreign('registercode')->references('code')->on('InforRegister')->onDelete('cascade');
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
        Schema::dropIfExists('Persons');
    }
}
