<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    protected $table='emplois';
    public $timestamps = false;

    protected $fillable = [
        'jour_id',     // Autoriser le champ jour_id
        'seance_id',   // Ajouter également les autres champs nécessaires
        'salle_id',
        'affectationclassenseignant_id',
    ];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function affectationClassEnseignant()
    {
        return $this->belongsTo(Affectationclassenseignant::class, 'affectationclassenseignant_id');
    }

    public function classe()
    {
        return $this->belongsTo(classmodel::class);
    }

    public function jour()
    {
        return $this->belongsTo(Jour::class);
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

}
