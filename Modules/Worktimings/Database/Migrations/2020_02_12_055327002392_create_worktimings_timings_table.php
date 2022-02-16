<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorktimingsTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worktimings__timings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('store_id')->unsigned();
            $table->string('monstart');
            $table->string('monend');
            $table->string('tuestart');
            $table->string('tueend');
            $table->string('wedstart');
            $table->string('wedend');
            $table->string('thustart');
            $table->string('thuend');
            $table->string('fristart');
            $table->string('friend');
            $table->string('satstart');
            $table->string('satend');
            $table->string('sunstart');
            $table->string('sunend');
 $table->foreign('store_id')->references('id')->on('stores__stores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worktimings__timings');
    }
}
