<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region__cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
              $table->integer('city_id');
            $table->string('city_name');
            $table->boolean('status')->default(0);

            // Your fields
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
        Schema::dropIfExists('region__cities');
    }
}
