<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatTbDebit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Debit', function (Blueprint $table) {
            $table->string('code');
            $table->integer('money');
            $table->datetime('time');
            $table->string('registercode');
            $table->primary('code');
            $table->foreign('registercode')->references('code')->on('InforRegister')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Debit');
    }
}
