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
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->string('D_emp_id_fk');
            $table->string('d_mother_name');
            $table->string('d_father_name');
            $table->string('spouse_name');
            $table->string('num_of_children');       
            $table->foreign('D_emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade');       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
