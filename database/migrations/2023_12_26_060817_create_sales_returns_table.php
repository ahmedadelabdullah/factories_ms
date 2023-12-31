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
        Schema::create('sales_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_number')->nullable();
            $table->foreignId('customer_id');
            $table->unsignedInteger('n_o_pieces');
            $table->unsignedInteger('n_o_models')->nullable();
            $table->tinyInteger('mark')->default(1);
            $table->date('date');
            $table->string('recipient')->nullable();
            $table->unsignedInteger('sale_per_piece')->nullable();
            $table->unsignedInteger('sale_amount')->default(0);
            $table->unsignedInteger('discount')->nullable();
            $table->unsignedInteger('comment')->nullable();
            $table->unsignedBigInteger('sub_total');
            $table->unsignedInteger('total_due_payment')->nullable(); // دفعة
            $table->unsignedInteger('total_due_return'); // مرتجع
            $table->unsignedBigInteger('total_due_invoice')->nullable(); // حساب فاتورة
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_returns');
    }
};
