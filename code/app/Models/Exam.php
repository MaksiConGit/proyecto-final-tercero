<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    public function teacherSubject()
    {
        return $this->belongsTo(TeacherSubject::class, 'teacher_subject_id');
    }

    public function teacher()
    {
        return $this->hasOneThrough(Teacher::class, TeacherSubject::class, 'id', 'id', 'teacher_subject_id', 'teacher_id');
    }

    public function subject()
    {
        return $this->hasOneThrough(Subject::class, TeacherSubject::class, 'id', 'id', 'teacher_subject_id', 'subject_id');
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_exams');
    }

    public function grades(){
        return $this->hasMany(Grade::class);
    }
}
