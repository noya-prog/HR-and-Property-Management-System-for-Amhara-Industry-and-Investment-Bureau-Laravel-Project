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
        Schema::create('emp__experiences', function (Blueprint $table) {
            $table->id();
            $table->string('EX_emp_id_fk');
            $table->unsignedBigInteger('job_id_fk');
            $table->string('prev_company');
            $table->string('period_of_service');
            $table->string('relevant_experience');
            $table->foreign('EX_emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade');   
            $table->foreign('job_id_fk')->references('id')->on('jobs');     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp__experiences');
    }
};
