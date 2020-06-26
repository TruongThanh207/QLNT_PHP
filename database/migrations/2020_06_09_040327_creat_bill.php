<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bill', function (Blueprint $table) {
            $table->string('code');
            $table->integer('CMND');
            $table->string('roomcode');
            $table->integer('electronic');
            $table->integer('water');
            $table->datetime('daynow');
            $table->integer('internet');
            $table->integer('truyenhinhcap');
            $table->integer('debit');
            $table->integer('totalmoney');
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
        Schema::dropIfExists('Bill');
    }
}
