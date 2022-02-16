<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingTcanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__tcan_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('tcan_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['tcan_id', 'locale']);
            $table->foreign('tcan_id')->references('id')->on('towing__tcans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('towing__tcan_translations', function (Blueprint $table) {
            $table->dropForeign(['tcan_id']);
        });
        Schema::dropIfExists('towing__tcan_translations');
    }
}
