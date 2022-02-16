<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingTowingtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__towingts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('typename');
            $table->string('img');
            $table->string('ratecard');
            $table->string('bprice');
            $table->string('price1-10');
            $table->string('price10-15');
            $table->string('price15-20');
            $table->string('price20-25');
            $table->string('price25');
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
        Schema::dropIfExists('towing__towingts');
    }
}
