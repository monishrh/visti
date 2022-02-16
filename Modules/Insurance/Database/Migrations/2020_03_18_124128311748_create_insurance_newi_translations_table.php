<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceNewiTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance__newi_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('newi_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['newi_id', 'locale']);
            $table->foreign('newi_id')->references('id')->on('insurance__newis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance__newi_translations', function (Blueprint $table) {
            $table->dropForeign(['newi_id']);
        });
        Schema::dropIfExists('insurance__newi_translations');
    }
}
