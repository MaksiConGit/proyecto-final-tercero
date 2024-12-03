<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time_slot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'start_time',
        'end_time',
        'subject_id',
        'days_of_week_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function daysofweek()
    {
        return $this->belongsTo(Days_of_week::class, 'days_of_week_id');
    }

    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }

}
