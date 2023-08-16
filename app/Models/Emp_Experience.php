<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp_Experience extends Model
{
    use HasFactory;
    protected $fillable=[
            'prev_company',
            'period_of_service',
            'relevant_experience',
            'EX_emp_id_fk',
            'job_id_fk',	
    ];
}
