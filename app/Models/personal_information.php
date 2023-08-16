<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal_information extends Model
{
    use HasFactory;
    protected $fillable =[
        'emp_id','email','fname','lname','mname','sex','dob','martial','phone','employeed_at','password','age','worked_for','dep_id_fk','job_id_fk',
    ];
}
