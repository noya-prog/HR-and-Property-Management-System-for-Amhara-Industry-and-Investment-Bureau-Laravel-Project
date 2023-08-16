<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $fillable =[
        'AD_emp_id_fk','state','city','kebele','house_num'
    ];
}
