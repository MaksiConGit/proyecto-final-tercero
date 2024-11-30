<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_number',
        'section',
        'career_id',
    ];

    public function career(){
        return $this->belongsTo(Career::class);
    }

    public function courseTeachers(){
        return $this->hasMany(CourseTeacher::class);
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, CourseStudent::class, 'course_id', 'id', 'id', 'student_id');
    }

}
