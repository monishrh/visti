<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclemBmodelTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclem__bmodel_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('bmodel_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['bmodel_id', 'locale']);
            $table->foreign('bmodel_id')->references('id')->on('vehiclem__bmodels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiclem__bmodel_translations', function (Blueprint $table) {
            $table->dropForeign(['bmodel_id']);
        });
        Schema::dropIfExists('vehiclem__bmodel_translations');
    }
}
