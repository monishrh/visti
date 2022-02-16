<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikersBikerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikers__biker_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('biker_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['biker_id', 'locale']);
            $table->foreign('biker_id')->references('id')->on('bikers__bikers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bikers__biker_translations', function (Blueprint $table) {
            $table->dropForeign(['biker_id']);
        });
        Schema::dropIfExists('bikers__biker_translations');
    }
}
