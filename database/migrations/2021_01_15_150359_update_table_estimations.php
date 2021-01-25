<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableEstimations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estimations', function (Blueprint $table) {
            $table->dropColumn('number');
            $table->string('reference', 255);
            $table->dropColumn('price');
            $table->decimal('total', '8', '2');
            $table->date('validation_date')->nullable();
            $table->unsignedInteger('contact_validator_id');
            $table->unsignedInteger('validation_duration');
            $table->unsignedInteger('month');
            $table->dropColumn('body');

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
        Schema::table('estimations', function (Blueprint $table) {
            //
        });
    }
}
