<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number',
        'date',
        'teacher_subject_id',
    ];

    public function teacherSubject(){
        return $this->belongsTo(TeacherSubject::class);
    }

    public function courseExams(){
        return $this->hasMany(CourseExam::class);
    }

    public function exams()
    {
        return $this->belongsToMany(
            Exam::class,
            CourseExam::class,
            'course_id',
            'exam_id'
        );
    }

    public function subject()
    {
        return $this->hasOneThrough(
            Subject::class,
            TeacherSubject::class,
            'id',
            'id',
            'teacher_subject_id',
            'subject_id'
        );
    }

    public function teacher()
    {
        return $this->hasOneThrough(
            Teacher::class,
            TeacherSubject::class,
            'id',
            'id',
            'teacher_subject_id',
            'teacher_id'
        );
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

}