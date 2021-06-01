<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->decimal('amount', 6, 2);
            $table->boolean('paid')->default(false);
            $table->string('month', '20');
            $table->string('year', '4');
            $table->text('description')->nullable();
            $table->unsignedInteger('totalnotax');
            $table->unsignedInteger('totaltax');
            $table->unsignedInteger('total');
            $table->date('paiment_date');
            $table->boolean('advance')->default(false);
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
        Schema::dropIfExists('invoices');
    }
}
