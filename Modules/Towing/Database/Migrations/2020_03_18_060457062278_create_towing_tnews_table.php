<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowingTnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towing__tnews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('vendor_id');
            $table->string('type');
            $table->string('payment');
            $table->string('paddress');
            $table->string('plat');
            $table->string('plong');
            $table->string('daddress');
            $table->string('dlat');
            $table->string('dlong');
            $table->string('ptime');
            $table->string('dtime');
            $table->string('bdate');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towing__tnews');
    }
}
