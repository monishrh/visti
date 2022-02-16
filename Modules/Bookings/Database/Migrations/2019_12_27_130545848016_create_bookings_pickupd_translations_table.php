<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsPickupdTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__pickupd_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('pickupd_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['pickupd_id', 'locale']);
            $table->foreign('pickupd_id')->references('id')->on('bookings__pickupds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__pickupd_translations', function (Blueprint $table) {
            $table->dropForeign(['pickupd_id']);
        });
        Schema::dropIfExists('bookings__pickupd_translations');
    }
}
