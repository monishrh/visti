<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsAcceptedTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__accepted_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('accepted_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['accepted_id', 'locale']);
            $table->foreign('accepted_id')->references('id')->on('bookings__accepteds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__accepted_translations', function (Blueprint $table) {
            $table->dropForeign(['accepted_id']);
        });
        Schema::dropIfExists('bookings__accepted_translations');
    }
}
