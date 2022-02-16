<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresStoresTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores__stores_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('stores_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['stores_id', 'locale']);
            $table->foreign('stores_id')->references('id')->on('stores__stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores__stores_translations', function (Blueprint $table) {
            $table->dropForeign(['stores_id']);
        });
        Schema::dropIfExists('stores__stores_translations');
    }
}
