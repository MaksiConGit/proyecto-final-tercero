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

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teachers', 'teacher_id','course_id')->withTimestamps();
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'teacher_subjects', 'teacher_id' , 'subject_id')->withTimestamps();
    }
}
