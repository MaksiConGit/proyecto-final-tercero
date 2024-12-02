<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionPrincipal extends Model
{
    use HasFactory;

    public function institution(){
        return $this->belongsTo(Institution::class);
    }
}
