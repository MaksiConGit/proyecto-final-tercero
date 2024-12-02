<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'exam_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
