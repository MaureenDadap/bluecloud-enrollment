<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSchedule extends Model
{
    protected $fillable = [
        'year_start',
        'year_end',
        'term'
    ];
}
