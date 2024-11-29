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

}
