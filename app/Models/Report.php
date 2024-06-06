<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'intern_id',
        'roll_no',
        'month',
        'week',
        'first_description',  
        'second_description',   
        'third_description',   
        'fourth_description',   
        'fifth_description',
        'comment',
        'reflection'
    ];

    public function Intern()
    {
        return $this->hasMany(Intern:: class);
    }

}
