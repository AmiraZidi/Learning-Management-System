<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectationetudmodel extends Model
{ public $timestamps = false;
    use HasFactory;
    protected $table='affectationetud';
    protected $fillable = ['etudiant_id', 'classe', 'semestre','specialite'];

    public function etudiant()
    {
        return $this->belongsTo(\App\Models\User::class,'etudiant_id');
    }
}
