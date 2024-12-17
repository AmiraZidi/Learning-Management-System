<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'affectationclassenseignant_id', 'date', 'courfile'];


    public function affectationclassenseignant()
    {
        return $this->belongsTo(Affectationclassenseignant::class, 'affectationclassenseignant_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id');
    }
}
