<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['course_student_id', 'has_attended', 'date'];

    public function courseStudent(){
        return $this->belongsTo(CourseStudent::class);
    }
}
