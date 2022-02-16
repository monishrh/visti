<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesBookingnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services__bookingnews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->string('bikerpickup');
            $table->string('sdate');
            $table->string('stime');
            $table->string('address');
            $table->string('lat');
            $table->string('long');
            $table->string('payment');
            $table->string('review');
            $table->string('rating');
            $table->string('s_charge');
            $table->string('distance');
            $table->string('plat');
            $table->string('plong');
            $table->string('otp');
            $table->boolean('payment_status')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('service_id')->references('id')->on('services__services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services__bookingnews');
    }
}
