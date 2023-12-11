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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name')->nullable();
            $table->Integer('com_code');
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->enum('role' , ['admin' , 'owner' , 'accountant' , 'customer' , 'supplier'])->default('accountant');
            $table->enum('status' , ['active' , 'inactive'])->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
