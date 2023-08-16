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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('item_name');
            $table->string('item_description');
            $table->string('item_measurement');
            $table->double('in_stock');
            $table->double('single_price');
            $table->string('store_name');
            $table->string('item_status');
            $table->unsignedBigInteger('equ_dep_id_fk');
            $table->unsignedBigInteger('type_id_fk');
            $table->foreign('equ_dep_id_fk')->references('id')->on('bureau_structures');
            $table->foreign('type_id_fk')->references('id')->on('equ_types');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
