<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsNewbookingsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__newbookings_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('newbookings_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['newbookings_id', 'locale']);
            $table->foreign('newbookings_id')->references('id')->on('bookings__newbookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__newbookings_translations', function (Blueprint $table) {
            $table->dropForeign(['newbookings_id']);
        });
        Schema::dropIfExists('bookings__newbookings_translations');
    }
}
