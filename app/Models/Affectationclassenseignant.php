<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectationclassenseignant extends Model
{ 
    use HasFactory;
    public $timestamps = false;

    public function enseignant()
    {
        return $this->belongsTo(\App\Models\User::class,'enseignant_id');
    } 

    public function classe()
    {
        return $this->belongsTo(\App\Models\classmodel::class,'classe_id');
    }

    public function matiere()
    {
        return $this->belongsTo(\App\Models\matieremodel::class,'matiere_id');
    }

    public function affectationclassetudiants()
    {
        return $this->hasMany(Affectationclassetudiant::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function absences()
{
    return $this->hasMany(Absence::class, 'affectationclassenseignant_id');
}
}

