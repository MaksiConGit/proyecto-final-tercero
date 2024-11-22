<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['course_number', 'section', 'career_id'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subjects');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'course_exams');
    }

    public function attendanceRecords()
    {
        return $this->hasManyThrough(AttendanceRecord::class, CourseStudent::class, 'course_id', 'course_student_id');
    }
}
