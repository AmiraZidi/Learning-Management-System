<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function etudiant()
    {
        return $this->belongsTo(\App\Models\User::class,'etudiant_id');
    }
    public function enseignant()
    {
        return $this->belongsTo(\App\Models\User::class,'enseignant_id');
    }
}
