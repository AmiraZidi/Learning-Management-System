<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialitemodel extends Model
{
    use HasFactory;
    protected $table='specialite';
    protected $primaryKey = 'id'; 
    protected $fillable = ['id','specialitem','designation'];

    public $timestamps = false;
}
