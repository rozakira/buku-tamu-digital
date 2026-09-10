<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'institution',
        'purpose',
        'visit_date',
        'source',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];
}