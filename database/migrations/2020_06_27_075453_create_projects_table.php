<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', '255');
            $table->text('mission');
            $table->text('result');
            $table->string('mediaPortfolioProjectPath', 255);
            $table->string('background_img_path', 255);
            $table->string('colorProject', 7);
            $table->string('slug', 255);
            $table->timestamp('endProject');
//            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->foreignId('client_id')->constrained();
//            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
