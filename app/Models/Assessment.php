<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'student_id', 'assessment_id', 'academic_schedule_id',  'total_units', 'unit_price', 'total_unit_price', 'misc_price', 'total_price'
    ];
}
