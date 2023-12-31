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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('com_code')->nulable();
            $table->enum('start_balance_status' , ['credit' , 'debit' , 'balanced'])->default('balanced');
            $table->unsignedBigInteger('start_balance');
            $table->unsignedBigInteger('current_balance')->nullable();
            $table->string('added_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->enum('status' , ['active' , 'inactive'])->default('active');
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
        Schema::dropIfExists('customers');
    }
};
