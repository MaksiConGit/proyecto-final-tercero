<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Principal extends Model
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

    public function user()
    {
        return $this->morphOne(User::class, 'accountable');
    }

    public function institutionPrincipals(){
        return $this->hasMany(InstitutionPrincipal::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function institutions(){
        return $this->belongsToMany(Institution::class, 'institution_principals');

    }

}
