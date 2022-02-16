<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsCanceledTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__canceled_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('canceled_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['canceled_id', 'locale']);
            $table->foreign('canceled_id')->references('id')->on('bookings__canceleds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__canceled_translations', function (Blueprint $table) {
            $table->dropForeign(['canceled_id']);
        });
        Schema::dropIfExists('bookings__canceled_translations');
    }
}
