<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclemBrandTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclem__brand_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('brand_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['brand_id', 'locale']);
            $table->foreign('brand_id')->references('id')->on('vehiclem__brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiclem__brand_translations', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
        });
        Schema::dropIfExists('vehiclem__brand_translations');
    }
}
