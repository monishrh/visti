<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppuserswalletTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appusers__wallet_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('wallet_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['wallet_id', 'locale']);
            $table->foreign('wallet_id')->references('id')->on('appusers__wallets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appusers__wallet_translations', function (Blueprint $table) {
            $table->dropForeign(['wallet_id']);
        });
        Schema::dropIfExists('appusers__wallet_translations');
    }
}
