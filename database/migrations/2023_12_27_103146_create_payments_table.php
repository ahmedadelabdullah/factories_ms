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
        Schema::create('payments', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('invoice_number')->nullable();
            $table->foreignId('customer_id');
            $table->unsignedInteger('n_o_pieces')->nullable();
            $table->unsignedInteger('n_o_models')->nullable();
            $table->date('date');
            $table->tinyInteger('mark')->default(2);
            $table->string('recipient')->nullable();
            $table->unsignedInteger('sale_per_piece')->nullable();
            $table->unsignedInteger('sale_amount')->nullable();
            $table->unsignedInteger('discount')->nullable();
            $table->unsignedInteger('comment')->nullable();
            $table->unsignedBigInteger('sub_total')->nullable();
            $table->unsignedInteger('total_due_payment'); // دفعة
            $table->unsignedInteger('total_due_return')->nullable(); // مرتجع
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
        Schema::dropIfExists('payments');
    }
};
