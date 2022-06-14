<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'last_name',
        'first_name',
        'birthdate',
        'program',
        'year',
        'application_status',
        'image'
    ];
}
