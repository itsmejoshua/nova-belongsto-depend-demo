<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityExamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_examples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained("countries");
            $table->foreignId('state_id')->nullable()->constrained("states");
            $table->foreignId('city_id')->nullable()->constrained("cities");
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
        Schema::dropIfExists('city_examples');
    }
}
