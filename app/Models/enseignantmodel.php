<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enseignantmodel extends Model
{
    use HasFactory;
    protected $table='enseignant';
    protected $primaryKey = 'numcin'; 
    protected $fillable = ['numcin', 'nom', 'prenom', 'email', 'specialite'];

    public $timestamps = false;

    static public function getrecord()
    {
        return enseignantmodel::select('nom', 'prenom' ,'specialite','numcin','email')->get();    }
        
}