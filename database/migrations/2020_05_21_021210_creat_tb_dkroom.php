<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatTbDkroom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InforRegister', function (Blueprint $table) {
            $table->string('code');
            $table->datetime('registerday');
            $table->string('nguoidaidien');
            $table->integer('CMND');
            $table->string('roomcode');
            $table->primary('code');
            $table->foreign('roomcode')->references('code')->on('Rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('InforRegister');
    }
}
