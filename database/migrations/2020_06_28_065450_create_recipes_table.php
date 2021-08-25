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
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamp('start_date_recipe')->default(now());
            $table->string('slug', 255);
            $table->string('picture_path', 255)->nullable();
            $table->dateTime('update_dev')->nullable();
            $table->timestamp('update_customer')->nullable();
            $table->boolean('validation_dev')->default(false);
            $table->boolean('validation_customer')->default(false);
            $table->timestamp('closed_date')->nullable();
            $table->foreignId('user_id')->constrained()->nullable();
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
