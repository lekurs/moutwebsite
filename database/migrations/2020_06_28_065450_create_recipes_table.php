<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('label', 255);
            $table->boolean('active')->default(true);
            $table->dateTime('start_date_recipe')->default(now());
            $table->string('slug', 255);
            $table->string('picture_path', 255)->nullable();
            $table->dateTime('update_dev')->nullable();
            $table->dateTime('update_customer')->nullable();
            $table->boolean('validation_dev')->default(false);
            $table->boolean('validation_customer')->default(false);
            $table->boolean('closed')->default(false);
            $table->dateTime('closed_date')->nullable();
            $table->unsignedInteger('author')->nullable();//foreign User table
            $table->foreignId('project_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('page_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
