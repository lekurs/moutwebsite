<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationsInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations_invoices', function (Blueprint $table) {
//            $table->unsignedInteger('estimation_id');
//            $table->unsignedInteger('invoice_id');
            $table->foreignId('estimation_id')->constrained();
            $table->foreignId('invoice_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimations_invoices');
    }
}
