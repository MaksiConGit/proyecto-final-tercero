<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
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
    
    public function user_()
    {
        return $this->morphOne(User::class, 'accountable');
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_teachers');
    }
    
    public function subjects()
    {
        return $this->hasManyThrough(
            Subject::class,          // Modelo final (Subject)
            TeacherSubject::class,   // Modelo intermedio (TeacherSubject)
            'teacher_id',            // Clave foránea en TeacherSubject
            'id',                    // Clave primaria en Subject
            'id',                    // Clave primaria en Teacher
            'subject_id'             // Clave foránea en Subject
        );
    }

    public function teacherSubjects()
    {
        return $this->hasMany(TeacherSubject::class);
    }

    public function courseTeachers()
    {
        return $this->hasMany(CourseTeacher::class);
    }
    


}
