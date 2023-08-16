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
        Schema::create('have__colaterals', function (Blueprint $table) {
            $table->id();
            $table->string('HC_emp_id_fk');
            $table->string('co_full_name');
            $table->string('co_email')->nullable();
            $table->string('co_company_name')->nullable();
            $table->string('co_state')->nullable();
            $table->string('co_city')->nullable();
            $table->string('co_kebele')->nullable();
            $table->string('co_relationship')->nullable();
            $table->string('co_salary')->nullable();
            $table->foreign('HC_emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('have__colaterals');
    }
};
