<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourses extends Model
{
    protected $fillable = [
        'student_id',
        'assessment_id',
        'course_id',
        'course_name',
    ];
}
