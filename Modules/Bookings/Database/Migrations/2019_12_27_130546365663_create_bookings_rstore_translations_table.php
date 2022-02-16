<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsRstoreTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings__rstore_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('rstore_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['rstore_id', 'locale']);
            $table->foreign('rstore_id')->references('id')->on('bookings__rstores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings__rstore_translations', function (Blueprint $table) {
            $table->dropForeign(['rstore_id']);
        });
        Schema::dropIfExists('bookings__rstore_translations');
    }
}
