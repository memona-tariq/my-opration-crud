<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations';

    protected $fillable = [
        'full_name',
        'father_name',
        'email',
        'password',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'picture',
    ];

    protected $hidden = [
        'password',
    ];
}

