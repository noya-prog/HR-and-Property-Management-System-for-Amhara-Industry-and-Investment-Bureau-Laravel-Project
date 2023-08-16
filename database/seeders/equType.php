<?php

namespace Database\Seeders;

use App\Models\equType as ModelsEquType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class equType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsEquType::create([
            'equ_type'=>'limited'
        ]);
        ModelsEquType::create([
            'equ_type'=>'permanent'
        ]);
    }
}
