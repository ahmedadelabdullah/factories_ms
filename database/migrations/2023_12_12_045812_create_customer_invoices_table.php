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
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_number');
            $table->unsignedBigInteger('cumtomer_id');
            $table->unsignedInteger('n_o_pieces');
            $table->unsignedInteger('n_o_models');
            $table->date('date');
            $table->string('recipient');
            $table->string('sale_per_piece');
            $table->integer('invoice_sale')->default(0);
            $table->string('invoice_image')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('partial_amount')->nullable();
            $table->unsignedBigInteger('total_amount')->nullable();
            $table->string('amount')->nullable();
            

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
        Schema::dropIfExists('customer_invoices');
    }
};
