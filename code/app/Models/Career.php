<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'institution_id',
    ];

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function students()
    {
        return $this->hasManyThrough(
            Student::class,       // Modelo destino
            Course::class,        // Modelo intermedio
            'career_id',          // Clave foránea en el modelo intermedio (courses.career_id)
            'id',                 // Clave foránea en el modelo destino (course_students.student_id)
            'id',                 // Llave local en este modelo (careers.id)
            'id'                  // Llave local en el modelo intermedio (courses.id)
        );
    }

    public function subjects()
    {
        return $this->hasManyThrough(
            Subject::class,       // Modelo destino
            Course::class,        // Modelo intermedio
            'career_id',          // Clave foránea en el modelo intermedio (courses.career_id)
            'id',                 // Clave foránea en el modelo destino (course_students.student_id)
            'id',                 // Llave local en este modelo (careers.id)
            'id'                  // Llave local en el modelo intermedio (courses.id)
        );
    }


}
