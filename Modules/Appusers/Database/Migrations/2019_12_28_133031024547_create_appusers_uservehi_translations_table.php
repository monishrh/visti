<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppusersuservehiTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appusers__uservehi_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('uservehi_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['uservehi_id', 'locale']);
            $table->foreign('uservehi_id')->references('id')->on('appusers__uservehis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appusers__uservehi_translations', function (Blueprint $table) {
            $table->dropForeign(['uservehi_id']);
        });
        Schema::dropIfExists('appusers__uservehi_translations');
    }
}
