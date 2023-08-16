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
        Schema::create('emp__education', function (Blueprint $table) {
            $table->id();
            $table->string('ED_emp_id_fk');
            $table->string('elementary_school');
            $table->string('high_school');
            $table->string('prep_school')->nullable();
            $table->string('higher_commission')->nullable();    
            $table->string('education_level')->nullable();    
            $table->foreign('ED_emp_id_fk')->references('emp_id')->on('personal_informations')->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp__education');
    }
};
