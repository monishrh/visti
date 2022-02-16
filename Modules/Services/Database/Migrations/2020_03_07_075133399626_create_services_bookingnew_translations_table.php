<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesBookingnewTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services__bookingnew_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('bookingnew_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['bookingnew_id', 'locale']);
            $table->foreign('bookingnew_id')->references('id')->on('services__bookingnews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services__bookingnew_translations', function (Blueprint $table) {
            $table->dropForeign(['bookingnew_id']);
        });
        Schema::dropIfExists('services__bookingnew_translations');
    }
}
