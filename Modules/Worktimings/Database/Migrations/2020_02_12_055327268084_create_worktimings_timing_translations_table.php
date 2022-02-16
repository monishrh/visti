<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorktimingsTimingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worktimings__timing_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('timing_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['timing_id', 'locale']);
            $table->foreign('timing_id')->references('id')->on('worktimings__timings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('worktimings__timing_translations', function (Blueprint $table) {
            $table->dropForeign(['timing_id']);
        });
        Schema::dropIfExists('worktimings__timing_translations');
    }
}
