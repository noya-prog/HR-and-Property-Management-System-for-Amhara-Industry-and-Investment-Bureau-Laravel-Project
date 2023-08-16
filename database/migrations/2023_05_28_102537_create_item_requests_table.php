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
        Schema::create('item_requests', function (Blueprint $table) {
            $table->id('r_id');
            $table->string('r_equ_name');
            $table->string('r_emp_id_fk');
            $table->string('r_equ_measurement');
            $table->string('r_amount');
            $table->string('r_equ_description');
            $table->string('r_inStock');
            $table->string('r_reason');
            $table->string('r_status');
            $table->string('out_of_store');
            $table->unsignedBigInteger('r_type_id_fk');
            $table->unsignedBigInteger('r_item_id');
            $table->foreign('r_item_id')->references('item_id')->on('equipment');
            $table->foreign('r_type_id_fk')->references('id')->on('equ_types');
            $table->foreign('r_emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_requests');
    }
};
