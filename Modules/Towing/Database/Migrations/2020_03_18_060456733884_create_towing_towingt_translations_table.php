<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingTowingtTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__towingt_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('towingt_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['towingt_id', 'locale']);
            $table->foreign('towingt_id')->references('id')->on('towing__towingts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('towing__towingt_translations', function (Blueprint $table) {
            $table->dropForeign(['towingt_id']);
        });
        Schema::dropIfExists('towing__towingt_translations');
    }
}
