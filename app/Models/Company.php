<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [ 'name',
                            'username',
                            'email',
                            'password',
                            'phone',
                            'address',
                            'website',
                            'description'];

    protected $casts = [
                        'email_verified_at' => 'datetime',];
}
