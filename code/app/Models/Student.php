<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function attendanceRecords()
    // {
    //     return $this->hasMany(AttendanceRecord::class);
    // }

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

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_students', 'student_id', 'course_id')
            ->withPivot('id')
            ->withTimestamps(); // Incluye el campo 'id' de la tabla intermedia
    }
}
