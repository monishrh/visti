<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsPickupTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__pickup_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('pickup_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['pickup_id', 'locale']);
            $table->foreign('pickup_id')->references('id')->on('bookings__pickups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__pickup_translations', function (Blueprint $table) {
            $table->dropForeign(['pickup_id']);
        });
        Schema::dropIfExists('bookings__pickup_translations');
    }
}
