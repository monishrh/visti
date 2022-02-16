<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingtvendorsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__tvendors_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('tvendors_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['tvendors_id', 'locale']);
            $table->foreign('tvendors_id')->references('id')->on('towing__tvendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('towing__tvendors_translations', function (Blueprint $table) {
            $table->dropForeign(['tvendors_id']);
        });
        Schema::dropIfExists('towing__tvendors_translations');
    }
}
