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

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students', 'course_id', 'student_id')
            ->withPivot('id') // Incluye el campo 'id' de la tabla intermedia
            ->withTimestamps(); // Incluye las marcas de tiempo si están presentes en la tabla intermedia
    }


    public function user()
    {
        return $this->morphOne(User::class, 'accountable');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function attendanceRecords()
    {
        return $this->hasManyThrough(
            AttendanceRecord::class, // El modelo final
            CourseStudent::class, // El modelo intermedio
            'student_id', // Llave foránea en la tabla intermedia (course_students)
            'course_student_id', // Llave foránea en la tabla final (attendance_records)
            'id', // Llave primaria en el modelo de estudiante
            'id', // Llave primaria en el modelo intermedio (course_students)
        );
    }
}
