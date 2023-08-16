<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('emp_id')->unique();
            $table->unsignedBigInteger('dep_id_fk');
            $table->unsignedBigInteger('job_id_fk');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('age');
            $table->string('sex');
            $table->date('dob');
            $table->string('martial');
            $table->string('phone');
            $table->string('employeed_at');
            $table->string('worked_for');
            $table->string('password');
            $table->foreign('dep_id_fk')->references('id')->on('bureau_structures');         
            $table->foreign('job_id_fk')->references('id')->on('jobs');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_informations');
    }
};
