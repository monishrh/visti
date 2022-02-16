<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsDelvrdTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__delvrd_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('delvrd_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['delvrd_id', 'locale']);
            $table->foreign('delvrd_id')->references('id')->on('bookings__delvrds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__delvrd_translations', function (Blueprint $table) {
            $table->dropForeign(['delvrd_id']);
        });
        Schema::dropIfExists('bookings__delvrd_translations');
    }
}
