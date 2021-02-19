<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleExamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_examples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classification_id')->nullable()->constrained("classifications");
            $table->foreignId('brand_id')->nullable()->constrained("brands");
            $table->foreignId('vehicle_model_id')->nullable()->constrained("vehicle_models");
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
        Schema::dropIfExists('vehicle_examples');
    }
}
