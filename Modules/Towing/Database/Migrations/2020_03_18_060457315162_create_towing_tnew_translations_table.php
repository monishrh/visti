<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingTnewTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__tnew_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('tnew_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['tnew_id', 'locale']);
            $table->foreign('tnew_id')->references('id')->on('towing__tnews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('towing__tnew_translations', function (Blueprint $table) {
            $table->dropForeign(['tnew_id']);
        });
        Schema::dropIfExists('towing__tnew_translations');
    }
}
