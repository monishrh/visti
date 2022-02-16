<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresreviewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores__reviews_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('reviews_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['reviews_id', 'locale']);
            $table->foreign('reviews_id')->references('id')->on('stores__reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores__reviews_translations', function (Blueprint $table) {
            $table->dropForeign(['reviews_id']);
        });
        Schema::dropIfExists('stores__reviews_translations');
    }
}
