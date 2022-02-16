<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionAreaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region__area_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('area_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['area_id', 'locale']);
            $table->foreign('area_id')->references('id')->on('region__areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('region__area_translations', function (Blueprint $table) {
            $table->dropForeign(['area_id']);
        });
        Schema::dropIfExists('region__area_translations');
    }
}
