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
            $table->id();
            $table->unsignedInteger('reference')->nullable();
            $table->string('title', '255');
            $table->unsignedInteger('totalnotax');
            $table->unsignedInteger('totaltax');
            $table->unsignedInteger('total');
            $table->boolean('validation')->default(false);
            $table->date('validation_date')->nullable();
            $table->string('year', 4);
            $table->unsignedInteger('validation_duration');
            $table->unsignedInteger('month');
//            $table->unsignedInteger('contact_validator_id');
//            $table->unsignedInteger('client_id');
//            $table->unsignedInteger('contact_id');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('contact_id')->constrained();
            $table->foreignId('contact_validator_id')->constrained('contacts');
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
        Schema::dropIfExists('estimations');
    }
}
