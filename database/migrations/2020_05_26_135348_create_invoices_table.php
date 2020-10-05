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
            $table->increments('id');
            $table->string('title');
            $table->string('number');
            $table->decimal('amount', 6, 2);
            $table->boolean('paid')->default(false);
            $table->integer('client_id')->unsigned();
//            $table->integer('downpaiementinvoice_id')->unsigned()->nullable();
            $table->timestamps();
            $table->string('year', 4);
//            $table->foreign('downpaiementinvoice_id')->references('id')->on('down_paiement_invoices')
//                ->onDelete('cascade');
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
