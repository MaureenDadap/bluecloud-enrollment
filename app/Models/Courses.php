<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //todo
    protected $fillable = [
        'first_name', 'last_name', 'address', 'course', 'year'
    ];
}
