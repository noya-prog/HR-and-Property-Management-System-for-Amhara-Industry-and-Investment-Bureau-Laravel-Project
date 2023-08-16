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
        Schema::create('are__colaterals', function (Blueprint $table) {
            $table->id();
            $table->string('AC_emp_id_fk');
            $table->string('ac_full_name');
            $table->string('ac_relationship')->nullable();
            $table->string('ac_state')->nullable();
            $table->string('ac_city')->nullable();
            $table->string('ac_kebele')->nullable();
            $table->foreign('AC_emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('are__colaterals');
    }
};
