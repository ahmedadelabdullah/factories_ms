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
            $table->unsignedBigInteger('customer_id');
            $table->unsignedInteger('n_o_pieces');
            $table->unsignedInteger('n_o_models')->nullable();
            $table->date('date');
            $table->string('recipient')->nullable();
            $table->unsignedInteger('sale_per_piece')->nullable();
            $table->unsignedInteger('sale_amount')->default(0);
            $table->unsignedInteger('discount')->nullable();
            $table->unsignedInteger('comment')->nullable();
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('total_due')->default(0);
            

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
