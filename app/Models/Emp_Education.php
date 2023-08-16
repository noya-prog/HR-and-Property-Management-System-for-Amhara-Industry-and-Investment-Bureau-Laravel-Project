<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp_Education extends Model
{
    use HasFactory;

    protected $fillable=[
        'elementary_school',
        'high_school',
        'prep_school',
        'higher_commission',
        'education_level',
        'ED_emp_id_fk',
    ];
}