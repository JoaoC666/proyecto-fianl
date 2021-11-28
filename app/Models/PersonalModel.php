<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalModel extends Model
{
    use HasFactory;//usamos ta tabla "mapa para poner los tipos de alarma "
    protected $table="mapa";
    protected $primarykey="id";
    protected $fillable=['alarma','lugar','estado'];
}
