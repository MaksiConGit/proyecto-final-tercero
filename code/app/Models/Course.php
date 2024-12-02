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

    public function exams()
    {
        return $this->belongsToMany(
            Exam::class,         // Modelo relacionado (Exam)
            CourseExam::class,      // Nombre de la tabla intermedia
            'course_id',         // Foreign key en la tabla intermedia que apunta a Course
            'exam_id'            // Foreign key en la tabla intermedia que apunta a Exam
        );
    }
}
