<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'birth_date',
        'nrc',
        'email',
        'password',
        'phone',
        'roll_no',
        'degree',
        'specialization',
        'class_project',
        'activity',
        'skill',
        'qualification',
        'gender',
        'address'
    ];
}
