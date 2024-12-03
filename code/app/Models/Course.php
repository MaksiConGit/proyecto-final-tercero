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
    
    public function courseExams(){
        return $this->hasMany(CourseExam::class);
    }

    public function courseStudents(){
        return $this->hasMany(CourseStudent::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teachers');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'course_exams');
    }

    public function teacherSubject()
    {
        return $this->belongsTo(TeacherSubject::class);
    }


}
