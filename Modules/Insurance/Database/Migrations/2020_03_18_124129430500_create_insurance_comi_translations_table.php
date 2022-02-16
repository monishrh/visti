<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceComiTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance__comi_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('comi_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['comi_id', 'locale']);
            $table->foreign('comi_id')->references('id')->on('insurance__comis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance__comi_translations', function (Blueprint $table) {
            $table->dropForeign(['comi_id']);
        });
        Schema::dropIfExists('insurance__comi_translations');
    }
}
