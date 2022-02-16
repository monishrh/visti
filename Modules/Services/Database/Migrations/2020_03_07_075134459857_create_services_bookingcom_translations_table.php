<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesBookingcomTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services__bookingcom_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('bookingcom_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['bookingcom_id', 'locale']);
            $table->foreign('bookingcom_id')->references('id')->on('services__bookingcoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services__bookingcom_translations', function (Blueprint $table) {
            $table->dropForeign(['bookingcom_id']);
        });
        Schema::dropIfExists('services__bookingcom_translations');
    }
}
