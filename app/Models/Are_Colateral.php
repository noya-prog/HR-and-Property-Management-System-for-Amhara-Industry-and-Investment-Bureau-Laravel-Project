<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Are_Colateral extends Model
{
    use HasFactory;

    protected $fillable=[
        'ac_full_name',
        'ac_relationship',
        'ac_state',
        'ac_city',
        'ac_kebele',
        'AC_emp_id_fk',
    ];
}
