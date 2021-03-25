<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reference')->nullable();
            $table->string('title', '255');
            $table->unsignedInteger('totalnotax');
            $table->unsignedInteger('totaltax');
            $table->unsignedInteger('total');
            $table->boolean('validation')->default(false);
            $table->date('validation_date')->nullable();
            $table->unsignedInteger('contact_validator_id');
            $table->unsignedInteger('validation_duration');
            $table->unsignedInteger('month');
            $table->integer('client_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')
                ->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('contact_validator_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimations');
    }
}
