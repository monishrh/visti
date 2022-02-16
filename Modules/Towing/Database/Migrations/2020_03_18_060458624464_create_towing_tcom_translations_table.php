<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingTcomTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__tcom_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('tcom_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['tcom_id', 'locale']);
            $table->foreign('tcom_id')->references('id')->on('towing__tcoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('towing__tcom_translations', function (Blueprint $table) {
            $table->dropForeign(['tcom_id']);
        });
        Schema::dropIfExists('towing__tcom_translations');
    }
}
