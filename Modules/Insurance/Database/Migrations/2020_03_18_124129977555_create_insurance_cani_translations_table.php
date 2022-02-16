<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceCaniTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance__cani_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('cani_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['cani_id', 'locale']);
            $table->foreign('cani_id')->references('id')->on('insurance__canis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance__cani_translations', function (Blueprint $table) {
            $table->dropForeign(['cani_id']);
        });
        Schema::dropIfExists('insurance__cani_translations');
    }
}
