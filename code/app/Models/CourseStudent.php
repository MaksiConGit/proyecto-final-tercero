<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_id'];


    public function attendances(){
    return $this->hasMany(AttendanceRecord::class);
    }

    public function student(){
    return $this->belongsTo(Student::class);

    }
}
