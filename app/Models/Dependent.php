<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    protected $fillable=[

        'd_mother_name' ,
        'd_father_name' ,
        'spouse_name', 
        'num_of_children' ,
        'D_emp_id_fk' ,
    ];

}
