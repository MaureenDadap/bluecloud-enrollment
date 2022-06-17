<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'student_id', 'student_courses_id', 'total_units', 'unit_price', 'total_unit_price', 'misc_price', 'total_price', 'enroll_status', 'is_valid'
    ];
}
