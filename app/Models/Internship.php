<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supervisor;
use App\Models\Intern;
use App\Models\Company;


class Internship extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'intern_id', 
        'supervisor_id',
        'company_id',
        'duration',
        'description'
    ];
    
    public function duration()
    {
        return $this->duration. " Months";
    }

    public function intern()
    {
        return $this->belongsTo(Intern:: class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor:: class);
    }

    public function company()
    {
        return $this->belongsTo(Company:: class);

    }


}
