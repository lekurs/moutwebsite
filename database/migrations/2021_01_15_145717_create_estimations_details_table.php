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
            $table->unsignedInteger('unit_price');
            $table->unsignedInteger('total_row');
            $table->unsignedInteger('total_row_notax');
            $table->unsignedInteger('total_row_tax');
            $table->unsignedInteger('display_order');
            $table->unsignedInteger('estimation_id')->onDelete('cascade');
            $table->unsignedInteger('taxe_id');
            $table->foreign('taxe_id')->references('id')->on('taxes');
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
        Schema::dropIfExists('estimations_details');
    }
}
