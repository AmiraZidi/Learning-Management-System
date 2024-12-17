<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matieremodel extends Model
{
    use HasFactory;
    protected $table = 'matiere';
    public $timestamps = false;


    protected $fillable = ['id', 'nom', 'semestre', 'coeff', 'specialite_id', 'ue', 'codeue', 'nbrheure', 'nature', 'type'];

    public function specialite()
    {
        return $this->belongsTo(\App\Models\specialitemodel::class,'specialite_id');
    }

        
}
