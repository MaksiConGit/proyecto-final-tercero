<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'dni',
        'phone',
        'birthdate',
        'city_id',
        'user_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_students', 'student_id','course_id')
            ->withPivot('id'); // Incluye el campo 'id' de la tabla intermedia
        ;
    }

    public function attendances(){
        return $this->hasManyThrough(AttendanceRecord::class, CourseStudent::class);
    }

    public function course_student(){
        return $this->hasMany(CourseStudent::class);
    }

}
