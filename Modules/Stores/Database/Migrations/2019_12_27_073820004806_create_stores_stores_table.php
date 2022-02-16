<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores__stores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->integer('city_id');
            $table->integer('area_id');
            $table->string('gaurage_name');
            $table->string('address');
            $table->string('lat');
            $table->string('long');
            $table->string('icon');
            $table->string('banner');
            $table->string('price');
            $table->string('phone_number');
            $table->string('aphone_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores__stores');
    }
}
