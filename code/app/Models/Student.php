<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
