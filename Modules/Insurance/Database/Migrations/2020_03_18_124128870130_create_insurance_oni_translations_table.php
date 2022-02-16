<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceOniTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance__oni_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('oni_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['oni_id', 'locale']);
            $table->foreign('oni_id')->references('id')->on('insurance__onis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance__oni_translations', function (Blueprint $table) {
            $table->dropForeign(['oni_id']);
        });
        Schema::dropIfExists('insurance__oni_translations');
    }
}
