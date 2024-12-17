<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['etudiant_id', 'affectationclassenseignant_id', 'seance', 'presence', 'date'];


    public function affectationclassenseignant()
    {
        return $this->belongsTo(\App\Models\Affectationclassenseignant::class,'affectationclassenseignant_id');
    }
    
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\User::class,'etudiant_id');
    }

}
