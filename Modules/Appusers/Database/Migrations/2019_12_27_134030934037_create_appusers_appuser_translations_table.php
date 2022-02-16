<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppusersAppuserTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appusers__appuser_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('appuser_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['appuser_id', 'locale']);
            $table->foreign('appuser_id')->references('id')->on('appusers__appusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appusers__appuser_translations', function (Blueprint $table) {
            $table->dropForeign(['appuser_id']);
        });
        Schema::dropIfExists('appusers__appuser_translations');
    }
}
