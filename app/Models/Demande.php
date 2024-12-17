<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id');
    }    
    public function salle()
    {
        return $this->belongsTo(\App\Models\Salle::class,'salle_id');
    }
}
