<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'code', 'name', 'program_code', 'year', 'term', 'days', 'time_start', 'time_end', 'instructor', 'schedule', 'slots', 'units'
    ];
}
