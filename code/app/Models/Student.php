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

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class);
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_students', 'student_id','course_id')
            ->withPivot('id')->withTimestamps(); // Incluye el campo 'id' de la tabla intermedia
        ;
    }

    public function user()
    {
        return $this->morphOne(User::class, 'accountable');
    }
}
