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
        Schema::create('customers_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_number')->nullable();
            $table->foreignId('customer_id')->default(0);
            $table->unsignedInteger('n_o_pieces')->default(0);
            $table->unsignedInteger('n_o_models')->nullable();
            $table->tinyInteger('mark')->default(0);
            $table->date('date');
            $table->string('recipient')->nullable();
            $table->unsignedInteger('sale_per_piece')->nullable();
            $table->unsignedInteger('sale_amount')->nullable();
            $table->unsignedInteger('discount')->nullable()->default(0);
            $table->unsignedInteger('comment')->nullable();
            $table->unsignedBigInteger('sub_total'); 
            $table->unsignedBigInteger('total_due_payment')->nullable()->default(0); // دفعة
            $table->unsignedBigInteger('total_due_return')->nullable()->default(0); // مرتجع
            $table->unsignedBigInteger('total_due_invoice')->nullable()->default(0); // حساب فاتورة
            
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
        Schema::dropIfExists('customers_accounts');
    }
};
