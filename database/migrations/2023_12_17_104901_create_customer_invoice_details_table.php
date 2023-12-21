<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_invoice_id');
            $table->string('product_id');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('row_sub_total');
            $table->timestamps();

            $table->foreign('customer_invoice_id')->references('id')->on('customer_invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_invoice_details');
    }
};
