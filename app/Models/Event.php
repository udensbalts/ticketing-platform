<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_time',
        'end_time',
        'capacity',
        'price',
        'image',
        'is_active',
        'organizer_name',
    ];

    protected $casts = [
    'start_time' => 'datetime',
    'end_time' => 'datetime',
    'is_active' => 'boolean',
];
}
