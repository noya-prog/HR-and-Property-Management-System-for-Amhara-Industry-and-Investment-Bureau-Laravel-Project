<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id_fk');
            $table->string('name');
            $table->string('mname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreign('emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade');  
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
