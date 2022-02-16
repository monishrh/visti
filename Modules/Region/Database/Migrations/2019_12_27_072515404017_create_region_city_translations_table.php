<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionCityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region__city_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('city_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['city_id', 'locale']);
            $table->foreign('city_id')->references('id')->on('region__cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('region__city_translations', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
        Schema::dropIfExists('region__city_translations');
    }
}
