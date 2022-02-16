<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsRdelTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__rdel_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('rdel_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['rdel_id', 'locale']);
            $table->foreign('rdel_id')->references('id')->on('bookings__rdels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__rdel_translations', function (Blueprint $table) {
            $table->dropForeign(['rdel_id']);
        });
        Schema::dropIfExists('bookings__rdel_translations');
    }
}
