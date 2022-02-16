<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingTongTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__tong_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('tong_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['tong_id', 'locale']);
            $table->foreign('tong_id')->references('id')->on('towing__tongs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('towing__tong_translations', function (Blueprint $table) {
            $table->dropForeign(['tong_id']);
        });
        Schema::dropIfExists('towing__tong_translations');
    }
}
