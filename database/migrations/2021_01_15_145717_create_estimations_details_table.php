<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product', 255);
            $table->text('description');
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', '8', '2');
            $table->decimal('total_row', '8', '2');
            $table->unsignedInteger('display_order');
            $table->unsignedInteger('estimation_id');
            $table->timestamps();

            $table->foreign('estimation_id')->references('id')->on('estimations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimations_details');
    }
}
