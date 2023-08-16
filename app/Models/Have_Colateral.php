<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Have_Colateral extends Model
{
    use HasFactory;

    protected $fillable = ['co_full_name', 'co_email','co_company_name','co_state','co_city','co_kebele', 'co_relationship','co_salary','HC_emp_id_fk'];
}
