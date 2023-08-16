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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->integer('max_Emp_Limit');
            $table->integer('Hired_Emp');
            $table->string('level')->nullable();
            $table->unsignedBigInteger('dep_id_fk');
            $table->unsignedBigInteger('leader_id')->nullable();
            $table->foreign('dep_id_fk')->references('id')->on('bureau_structures');         
            $table->foreign('leader_id')->references('id')->on('leaders');         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
