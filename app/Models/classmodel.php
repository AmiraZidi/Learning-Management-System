<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class classmodel extends Model
{
    use HasFactory;
    protected $table='class';
    public $timestamps = false;
    protected $fillable = ['id', 'nom', 'semestre','specialite_id'];

    public function specialite()
    {
        return $this->belongsTo(\App\Models\specialitemodel::class,'specialite_id');
    }

    public function affectations()
    {
        return $this->hasMany(Affectationclassenseignant::class, 'classe_id');
    }
}