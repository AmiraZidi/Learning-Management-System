<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function affectationclassenseignant()
    {
        return $this->belongsTo(\App\Models\Affectationclassenseignant::class,'affectationclassenseignant_id');
    }
 
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\User::class,'etudiant_id');
    }

    public function affectationclassetudiant()
    {
        return $this->belongsTo(Affectationclassetudiant::class);
    }
}
