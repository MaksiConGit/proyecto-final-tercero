<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'institution_id'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class)->orderBy('course_number');
    }

    public function subjects()
    {
        return $this->hasManyThrough(Subject::class, CourseSubject::class);
    }

}
