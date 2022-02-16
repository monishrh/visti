<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesBookingongTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services__bookingong_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('bookingong_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['bookingong_id', 'locale']);
            $table->foreign('bookingong_id')->references('id')->on('services__bookingongs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services__bookingong_translations', function (Blueprint $table) {
            $table->dropForeign(['bookingong_id']);
        });
        Schema::dropIfExists('services__bookingong_translations');
    }
}
