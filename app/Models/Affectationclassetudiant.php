<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectationclassetudiant extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function etudiant()
    {
        return $this->belongsTo(\App\Models\User::class,'etudiant_id');
    }

    public function classe()
    {
        return $this->belongsTo(\App\Models\classmodel::class,'classe_id');
    }

    public function affectationclassenseignant()
    {
        return $this->belongsTo(\App\Models\Affectationclassenseignant::class,'affectationclassenseignant_id');
    }

    public function note()
    {
        return $this->hasOne(Note::class);
    }
}
