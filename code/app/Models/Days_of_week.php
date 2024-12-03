<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days_of_week extends Model
{
    use HasFactory;

    protected $table = 'days_of_weeks';

    public function timeslots()
    {
        return $this->hasMany(Time_slot::class, 'day_of_week_id');
    }


}
