<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classmodel; // Assurez-vous d'importer le modèle Classmodel si ce n'est pas déjà fait

class etudiantmodel extends Model
{
    use HasFactory;

    protected $table = 'etudiant';
    public $timestamps = false;
    protected $primaryKey = 'numcin';
    protected $fillable = ['numcin', 'nom', 'prenom', 'email', 'specialite', 'classe', 'semestre'];
    protected $casts = [
        'classe' => 'string',
    ];  

    static public function getrecord()
    {
        return etudiantmodel::select('nom', 'prenom', 'specialite', 'numcin')->get(); 
    }   

    static public function getrecord1()
    {
        return etudiantmodel::select('nom', 'prenom', 'specialite', 'numcin', 'email', 'classe')->get();
    }

    public function aff()
    {
        $classes = Classmodel::orderBy('nom')->get();
        return view('etudiant/affetud', ['classes' => $classes]);
    }    
}
