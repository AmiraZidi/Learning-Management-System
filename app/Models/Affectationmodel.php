<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Affectationmodel extends Model
{ protected $table='affectation';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['enseignant_id', 'matiere', 'classe', 'semestre'];


    public function enseignant()
    {
        return $this->belongsTo(\App\Models\User::class,'enseignant_id');
    }
}



