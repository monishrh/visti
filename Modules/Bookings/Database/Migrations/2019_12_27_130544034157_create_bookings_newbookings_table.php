<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsNewbookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__newbookings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('brand');
            $table->integer('model');
            $table->string('bike_number');
            $table->string('bikerpickup');
             $table->string('image1');
            $table->string('image2');
             $table->string('image3');
            $table->string('image4');
            $table->string('bikerdrop');
            $table->string('address');
            $table->string('lat');
            $table->string('long');
            $table->string('payment');
            $table->string('payment_status');
            $table->string('sinstruction');
            $table->string('review');
            $table->string('rating');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores__stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings__newbookings');
    }
}
