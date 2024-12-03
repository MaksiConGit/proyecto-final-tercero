<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Principal extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->morphOne(User::class, 'accountable');
    }

    public function institutionPrincipals(){
        return $this->hasMany(InstitutionPrincipal::class);
    }

}
