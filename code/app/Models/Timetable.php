<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timetable extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
    ];

    public function timeSlots()
    {
        return $this->belongsToMany(Time_slot::class, 'timetable_time_slots');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function careers()
    {
        return $this->hasManyThrough(
            Career::class,    // Modelo final al que deseas acceder
            Course::class,    // Modelo intermedio más cercano
            'id',             // Llave foránea en Course
            'id',             // Llave foránea en Career
            'course_id',      // Llave local en Timetable
            'career_id'       // Llave local en Course que conecta con Career
        );
    }

    public function institutions()
    {
        return $this->hasManyThrough(
            Institution::class,  // Modelo final al que deseas acceder
            Career::class,       // Modelo intermedio más cercano
            'id',                // Llave foránea en Career
            'id',                // Llave foránea en Institution
            'course_id',         // Llave local en Timetable
            'institution_id'     // Llave local en Career que conecta con Institution
        );
    }


}
