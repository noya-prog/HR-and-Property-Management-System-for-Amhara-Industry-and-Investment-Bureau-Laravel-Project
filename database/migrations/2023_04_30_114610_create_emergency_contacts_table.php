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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('EM_emp_id_fk');
            $table->string('EC_name'); 
            $table->string('EC_relation'); 
            $table->string('EC_email')->nullable(); 
            $table->string('EC_phone'); 
            $table->string('EC_age'); 
            $table->string('EC_sex'); 
            $table->foreign('EM_emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
    }
};
