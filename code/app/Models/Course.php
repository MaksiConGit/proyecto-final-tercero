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

    public function institution()
    {
        return $this->hasOneThrough(
            Institution::class,
            Career::class,
            'id',                // Llave primaria en Career
            'id',                // Llave primaria en Institution
            'career_id',         // Llave foránea en Course
            'institution_id'     // Llave foránea en Career
        );
    }

    public function courseTeachers(){
        return $this->hasMany(CourseTeacher::class);
    }

    public function students()
    {
        return $this->hasManyThrough(
            Student::class,       // Modelo destino
            CourseStudent::class,        // Modelo intermedio
            'course_id',          // Clave foránea en el modelo intermedio (courses.career_id)
            'id',                 // Clave foránea en el modelo destino (course_students.student_id)
            'id',                 // Llave local en este modelo (careers.id)
            'id'                  // Llave local en el modelo intermedio (courses.id)
        );
    }

    public function subjects()
    {
        return $this->hasManyThrough(
            Subject::class,       // Modelo destino
            CourseSubject::class,        // Modelo intermedio
            'course_id',          // Clave foránea en el modelo intermedio (courses.career_id)
            'id',                 // Clave foránea en el modelo destino (course_students.student_id)
            'id',                 // Llave local en este modelo (careers.id)
            'id'                  // Llave local en el modelo intermedio (courses.id)
        );
    }

    public function teachers()
    {
        return $this->hasManyThrough(
            Teacher::class,       // Modelo destino
            CourseTeacher::class,        // Modelo intermedio
            'course_id',          // Clave foránea en el modelo intermedio (courses.career_id)
            'id',                 // Clave foránea en el modelo destino (course_students.student_id)
            'id',                 // Llave local en este modelo (careers.id)
            'id'                  // Llave local en el modelo intermedio (courses.id)
        );
    }

}
